<script type="text/ng-template" id="suscription.html">
    <div class="modal-header">
        <button type="button" class="close" ng-click="cancel()" aria-label="Close"><span style="color:#00AFEF !important;" aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">¡Suscríbete en nuestra página y recibe $10.000!</h3>
    </div>
    <div class="modal-body add-scroll">
        <section>
            <article>
                <p>
                Te estaremos informando de nuestras promociones, productos destacados, noticias y mucho más y recibe $10.000 para tus compras*
                </p>
            </article>
            <p ng-if="suscritedSucces" class="bg-success">Revisa tu correo electrónico para confirmar tu suscripción*</p>
            <p ng-if="hasSuscription" class="bg-danger">Ya cuentas con una suscripción.</p>
            <form name="suscriptionForm" novalidate ng-show="!(suscritedSucces || hasSuscription)">
                <div class="form-group">
                    <label for="emailSuscription">Correo electrónico</label>
                    <input type="email" class="form-control" name="emailSuscription" id="exampleInputEmail1" ng-model="email" placeholder="Correo electrónico" required>
                </div>
            </form>
        </section>
    </div>
    <div class="modal-footer">
        <p style="float:left !important;">*Recuerda que tus $10.000 tienen vigencia de 15 días</p><button  ng-show="!(suscritedSucces || hasSuscription)" style="float:right !important;" type="button" class="btn btn-primary" ng-disabled="suscriptionForm.$invalid" ng-click="ok( email )">¡Suscribirme ahora!</button>
    </div>
</script>
