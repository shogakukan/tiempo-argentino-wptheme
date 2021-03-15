<div class="account-info mt-4">
    <div class="container">
        <div class="title text-center">
            <h4>Tus datos son:</h4>
        </div>
        <div class="info-forms">
            <div class="personal-info">
                <div class="form-container d-flex flex-wrap justify-content-md-between mx-auto mt-4">
                    <div class="input-container col-12 col-md-5 mx-1 d-flex align-items-center"
                        id="personalInfoInputContainer">
                        <label for="Nombre">Nombre: </label>
                        <input type="text" id="Nombre" placeholder=" " value="Lorena" disabled>
                    </div>
                    <div class="input-container col-12 col-md-5 mx-1 d-flex align-items-center"
                        id="personalInfoInputContainer">
                        <label for="Apellido">Apellido: </label>
                        <input type="text" id="Apellido" placeholder=" " value="Martinez" disabled>
                    </div>
                    <div class="input-container col-12 col-md-5 mx-1 d-flex align-items-center"
                        id="personalInfoInputContainer">
                        <label for="Contacto">Tel. Contacto: </label>
                        <input type="tel" id="Contacto" placeholder=" " value="54532355343" disabled>
                    </div>
                    <div class="input-container col-12 col-md-5 mx-1 d-flex align-items-center"
                        id="personalInfoInputContainer">
                        <label for="email">E-mail: </label>
                        <input type="email" id="email" placeholder=" " value="loreRosario_1985@gmail.com" disabled>
                    </div>
                    <div class="input-container col-12 col-md-5 mx-1 d-flex align-items-center"
                        id="personalInfoInputContainer">
                        <label for="pais">País: </label>
                        <input type="text" id="pais" placeholder=" " value="Argentina" disabled>
                    </div>
                    <div class="input-container col-12 col-md-5 mx-1 d-flex align-items-center"
                        id="personalInfoInputContainer">
                        <label for="provincia">Provincia: </label>
                        <input type="text" id="provincia" placeholder=" " value="Santa Fe" disabled>
                    </div>
                    <div class="input-container col-12 col-md-5 mx-1 d-flex align-items-center"
                        id="personalInfoInputContainer">
                        <label for="Contrasena">Contraseña: </label>
                        <input type="password" id="Contrasena" placeholder=" " value="Contraseña" disabled>
                    </div>
                </div>
                <div class="btns-container text-center d-flex justify-content-center mt-4">
                    <button id="editPersonalInfo">Editar datos</button>
                    <button id="finishEditingPersonalInfo" class="gray-btn-black-text">Cerrar</button>
                </div>
            </div>
            <div class="delivery-info text-md-center mt-3">
                <button class="delivery-info-dropdown collapsed" type="button" data-toggle="collapse"
                    data-target="#deliveryInfo" aria-expanded="false" aria-controls="deliveryInfo">
                    <div class="d-flex">
                        <div>
                            <p>Datos para recibir la Edición Impresa</p>
                        </div>
                        <div class="dropdown-icon mr-2">
                            <img src="../../assets/images/arrow.svg" alt="" />
                        </div>
                    </div>
                </button>
                <div class="collapse" id="deliveryInfo">
                    <div class="card card-body p-0">
                        <div class="subtitle">
                            <p>Por favor, indicamos un domicilio donde se te enviará el diario.</p>
                        </div>
                        <div class="form-container d-flex flex-wrap justify-content-md-between mx-auto">
                            <div class="input-container col-12 col-md-5 mx-1 d-flex align-items-center d-flex align-items-center"
                                id="deliveryInputContainer">
                                <label for="Provincia">Provincia: </label>
                                <input type="text" id="Provincia" placeholder=" " value="Santa Fe" disabled>
                            </div>
                            <div class="input-container  col-12 col-md-5 mx-1 d-flex align-items-center d-flex align-items-center"
                                id="deliveryInputContainer">
                                <label for="Localidad">Localidad: </label>
                                <input type="text" id="Localidad" placeholder=" " value="Rosario" disabled>
                            </div>
                            <div class="input-container  col-12 col-md-5 mx-1 d-flex align-items-center d-flex align-items-center"
                                id="deliveryInputContainer">
                                <label for="Calle">Calle: </label>
                                <input type="text" id="Calle" placeholder=" " value="Calle Rosarina" disabled>
                            </div>
                            <div class="input-container  col-12 col-md-5 mx-1 d-flex align-items-center d-flex align-items-center"
                                id="deliveryInputContainer">
                                <label for="Numero">Número: </label>
                                <input type="number" id="Numero" placeholder=" " value="2344" disabled>
                            </div>
                            <div class="input-container  col-12 col-md-5 mx-1 d-flex align-items-center d-flex align-items-center"
                                id="deliveryInputContainer">
                                <label for="cp">CP: </label>
                                <input type="text" id="cp" placeholder=" " value="S2000" disabled>
                            </div>
                        </div>
                        <div class="btns-container text-center d-flex justify-content-center my-4">
                            <button id="editDeliveryInfo">Editar datos</button>
                            <button id="finishEditingDeliveryInfo" class="gray-btn-black-text">Cerrar</button>
                        </div>
                    </div>
                </div>
                <div class="support text-center">
                    <p>Deseo <a href=""><b>contactar con soporte</b></a></p>
                </div>
            </div>
        </div>
    </div>
</div>