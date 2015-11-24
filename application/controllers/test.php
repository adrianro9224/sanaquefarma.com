<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 24/11/2015
 * Time: 14:13
 */

$xml_string = <<<XML
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
   <soap:Body>
      <StandardCommunicationSOAPResponse xmlns="http://www.w3.org/XML/1998/namespace:lang">
         <StandardCommunicationSOAPResult>
            <SessionID>85382982-7261-4029-9409-1dce96ef1018</SessionID>
            <Body><![CDATA[<?xml version="1.0" encoding="ISO-8859-1" standalone="yes"?><Respuesta><Estado><code>SUCESS</code><message /></Estado><Respuesta_accion><item><idcliente>8600267530</idcliente><idtercero>8600267530</idtercero><razoncial>ACERIAS DE COLOMBIA ACESCO &amp; CIA SCA</razoncial><direccion>CALLE 116 15 N 17</direccion><ciudad>BOGOTA</ciudad><telefono>8575858</telefono><fax /><dircorres /><email /><website /><idzona>202</idzona><idvende>001</idvende><diplazo>30</diplazo><cupocre>0,0000</cupocre><codicta>13050501        </codicta><contacto /><dirconta /><emailconta /><telconta /><contactoa /><dircontaa /><emailcontaa /><telcontaa /><gerente /><emailgeren /><dirgerente /><telgerente /><tipocliente>002</tipocliente><diagracia>0</diagracia><bloqueo>False</bloqueo><autorizacion>False</autorizacion><bloqueopornit>False</bloqueopornit><segmento>0208            </segmento><tag /><codigoubicacion>102</codigoubicacion><formatodefactura /><formatodepedido /><formatoderemision /><formatodefacturaremision /><divpolitica>5711001                  </divpolitica><codigodane>11001                    </codigodane><codalterno>8600267530</codalterno><indncf>0</indncf><grempresarial /><pais>169</pais><tipo>N</tipo><centrocosto /><item /><generarmora>0</generarmora><intmora>0,0000</intmora><deshabilitado>0</deshabilitado><fpagcontado>1</fpagcontado><fpagcredito>1</fpagcredito><nombreter>ACERIAS DE COLOMBIA ACESCO &amp; CIA SCA</nombreter><nombvende>CONTACTADO POR LA GERENCIA COMERCIAL</nombvende><nombzona>BOGOTA                                  </nombzona><desccta>CLIENTES NACIONALES</desccta><dessegmento>FABRICACION DE PRODUCTOS  METALICOS     </dessegmento><tercerostipoempresa>20</tercerostipoempresa><ubicaciongeograficanombre>FUERA DEL DISTRITO DE CARTAGENA</ubicaciongeograficanombre><desdivpolitica>BOGOTA                                  </desdivpolitica><centrocosto_codigo /><centrocosto_descripcion /></item></Respuesta_accion></Respuesta>]]></Body>
            <Status>SUCCESS</Status>
            <Message/>
            <Code/>
         </StandardCommunicationSOAPResult>
      </StandardCommunicationSOAPResponse>
   </soap:Body>
</soap:Envelope>
XML;

class XmlToArrayParser {
    /** The array created by the parser can be assigned to any variable: $anyVarArr = $domObj->array.*/
    public $array = array();
    private $parse_error = false;
    private $parser;
    private $pointer;

    /** Constructor: $domObj = new xmlToArrayParser($xml); */
    public function __construct($xml) {
        $xml = str_replace(array('&'), array('&amp;'), $xml);
        $this->pointer =& $this->array;
        $this->parser = xml_parser_create("UTF-8");
        xml_set_object($this->parser, $this);
        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
        xml_set_element_handler($this->parser, "tag_open", "tag_close");
        xml_set_character_data_handler($this->parser, "cdata");
        $this->parse_error = xml_parse($this->parser, ltrim($xml)) ? false : true;
    }

    /** Free the parser. */
    public function __destruct() {
        xml_parser_free($this->parser);
    }

    /** Get the xml error if an an error in the xml file occured during parsing. */
    public function get_xml_error() {
        if ($this->parse_error) {
            $errCode = xml_get_error_code($this->parser);
            $thisError = "Error Code [" . $errCode . "] \"<strong style='color:red;'>" . xml_error_string($errCode) . "</strong>\",
                            at char " . xml_get_current_column_number($this->parser) . "
                            on line " . xml_get_current_line_number($this->parser) . "";
        } else {
            $thisError = $this->parse_error;
        }
        return $thisError;
    }

    private function tag_open($parser, $tag, $attributes) {
        $this->convert_to_array($tag, 'attrib');
        $idx = $this->convert_to_array($tag, 'cdata');
        if (isset($idx)) {
            $this->pointer[$tag][$idx] = Array(
                '@idx' => $idx,
                '@parent' => &$this->pointer
            );
            $this->pointer =& $this->pointer[$tag][$idx];
        } else {
            $this->pointer[$tag] = Array(
                '@parent' => &$this->pointer
            );
            $this->pointer =& $this->pointer[$tag];
        }
        if (!empty($attributes)) {
            $this->pointer['attrib'] = $attributes;
        }
    }

    /** Adds the current elements content to the current pointer[cdata] array. */
    private function cdata($parser, $cdata) {
        if (strlen(trim($cdata)) > 0) {
            if (isset($this->pointer['cdata'])) {
                $this->pointer['cdata'] .= $cdata;
            } else {
                $this->pointer['cdata'] = $cdata;
            }
        }
    }

    private function tag_close($parser, $tag) {
        $current =& $this->pointer;
        if (isset($this->pointer['@idx'])) {
            unset($current['@idx']);
        }

        $this->pointer =& $this->pointer['@parent'];
        unset($current['@parent']);

        if (isset($current['cdata']) && count($current) == 1) {
            $current = $current['cdata'];
        } else if (empty($current['cdata'])) {
            unset($current['cdata']);
        }
    }

    /** Converts a single element item into array(element[0]) if a second element of the same name is encountered. */
    private function convert_to_array($tag, $item) {
        if (isset($this->pointer[$tag][$item])) {
            $content = $this->pointer[$tag];
            $this->pointer[$tag] = array(
                (0) => $content
            );
            $idx = 1;
        } else if (isset($this->pointer[$tag])) {
            $idx = count($this->pointer[$tag]);
            if (!isset($this->pointer[$tag][0])) {
                foreach ($this->pointer[$tag] as $key => $value) {
                    unset($this->pointer[$tag][$key]);
                    $this->pointer[$tag][0][$key] = $value;
                }
            }
        } else {
            $idx = null;
        }
        return $idx;
    }
}

echo "<pre>";
$xmlObject = new XmlToArrayParser($xml_string);
//print_r($xmlObject->array);
echo "</pre>";

$array = $xmlObject->array;
echo "<pre>";
var_dump($sxe = simplexml_load_string($array['soap:Envelope']['soap:Body']['StandardCommunicationSOAPResponse']['StandardCommunicationSOAPResult']['Body']));
echo "<pre>";