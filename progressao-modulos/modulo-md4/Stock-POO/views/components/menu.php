<?php

    $array_nome = explode(" ", $dados["nome"]);
    $tamanho = count($array_nome);

    if ($tamanho > 2){
        $nome = "$array_nome[0] ". $array_nome[$tamanho-1];
    
    } else{
        $nome = $dados["nome"];
    }

?>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        
        <?php if ($dados["tipoAcesso"] == "admin") : ?>
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Funções Administrador</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Módulos
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <!-- <i class="fas fa-columns"></i> -->
                            <svg class="login" xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 2048 2048"><path fill="white" d="m1344 2l704 352v785l-128-64V497l-512 256v258l-128 64V753L768 497v227l-128-64V354zm0 640l177-89l-463-265l-211 106zm315-157l182-91l-497-249l-149 75zm-507 654l-128 64v-1l-384 192v455l384-193v144l-448 224L0 1735v-676l576-288l576 288zm-640 710v-455l-384-192v454zm64-566l369-184l-369-185l-369 185zm576-1l448-224l448 224v527l-448 224l-448-224zm384 576v-305l-256-128v305zm384-128v-305l-256 128v305zm-320-288l241-121l-241-120l-241 120z"/></svg>
                        </div>
                        Produtos
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </a>
                
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="?pagina=listarProdutos">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 2048 2048"><path fill="white" d="M1024 1000v959l-64 32l-832-415V536l832-416l832 416v744h-128V680zm-64-736L719 384l621 314l245-122zm-64 1552v-816L256 680v816zM335 576l625 312l238-118l-622-314zm1073 1216v-128h640v128zm0-384h640v128h-640zm-256 640v-128h128v128zm0-512v-128h128v128zm0 256v-128h128v128zm-128 24h1zm384 232v-128h640v128z"/></svg>
                            </div>
                            Lista de Produtos
                        </a>
                        <a class="nav-link" href="?pagina=adicionarProduto">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 2048 2048"><path fill="white" d="M896 1537V936L256 616v880l544 273l-31 127l-641-320V472L960 57l832 415v270q-70 11-128 45V616l-640 320v473zM754 302l584 334l247-124l-625-313zm206 523l240-120l-584-334l-281 141zm888 71q42 0 78 15t64 41t42 63t16 79q0 39-15 76t-43 65l-717 717l-377 94l94-377l717-716q29-29 65-43t76-14m51 249q21-21 21-51q0-31-20-50t-52-20q-14 0-27 4t-23 15l-692 692l-34 135l135-34z"/></svg>
                            </div>
                            Inserir Produto
                        </a>
                    </nav>
                </div>

                <div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false"      aria-controls="collapsePages">
                        <div class="sb-nav-link-icon">
                            <svg class="login" xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 24 24"><path fill="white" d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9A3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42c-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3a3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3a3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.536 5.536 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13zM0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9c-.59.68-.95 1.62-.95 2.65V20zm24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65c2.56.34 4.45 1.51 4.45 2.9z"/></svg>
                        </div>
                        Usuários
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="?pagina=listarClientes">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 1024 1024"><path fill="white" d="M704 192h160v736H160V192h160v64h384zM288 512h448v-64H288zm0 256h448v-64H288zm96-576V96h256v96z"/></svg>
                            </div>    
                            Lista de Usuários
                        </a>
                        <a class="nav-link collapsed" href="inforUser.php">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 20 20"><circle cx="10" cy="5.5" r="4.5" fill="white"/><path fill="white" d="M20 16.288v-1.632l-1.012-.168c-.055-.22-.164-.437-.324-.76l-.014-.028l.619-.844l-1.181-1.18l-.844.618a3 3 0 0 0-.788-.338l-.112-1.012h-1.632l-.141.851l-.027.161c-.282.056-.507.17-.788.338l-.844-.619l-1.18 1.181l.562.844c-.106.176-.168.33-.227.49l-.025.07l-.01.027q-.035.096-.076.2L11 14.6v1.631l1.012.17c.057.28.17.505.338.786l-.563.844l.969.969l.213.213l.32-.213l.524-.35c.199.1.443.2.691.3l.05.02l.046.018l.002.012l.167 1h1.687l.167-1l.002-.012c.281-.057.506-.17.787-.338l.477.35l.367.27l1.182-1.182l-.62-.844c.17-.28.282-.563.338-.788Zm-4.5.843a1.66 1.66 0 0 1-1.688-1.687c0-.956.732-1.688 1.688-1.688s1.688.732 1.688 1.688s-.732 1.687-1.688 1.687M10 11c.739 0 1.418.047 2.04.133l-1.594 1.596l.574.862l-1.02.12v3.367l1.098.183l-.598.897l.842.842H2v-3c0-2 2.083-5 8-5"/></svg>
                            </div>
                            Informações
                        </a>
                    </nav>
                </div>
                <!-- Sistema -->
                <div class="sb-sidenav-menu-heading">Configurações</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#configurações" aria-expanded="false"                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <!-- <i class="fas fa-columns"></i> -->
                            <svg class="login"  xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 48 48"><defs><mask id="ipSConfig0"><g fill="none" stroke-linejoin="round" stroke-width="4"><path fill="#fff" stroke="#fff" d="m24 4l-6 6h-8v8l-6 6l6 6v8h8l6 6l6-6h8v-8l6-6l-6-6v-8h-8z"/><path fill="#000" stroke="#000" d="M24 30a6 6 0 1 0 0-12a6 6 0 0 0 0 12Z"/></g></mask></defs><path fill="white" d="M0 0h48v48H0z" mask="url(#ipSConfig0)"/></svg>
                        </div>
                        Sistema
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                <div class="collapse" id="configurações" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="registerLog.php">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 2048 2048"><path fill="white" d="M1755 512h-475V37zm-795 520q38 0 71 14t59 40t39 59t15 71q0 38-14 71t-40 59t-59 39t-71 15q-38 0-71-14t-59-40t-39-59t-15-71q0-38 14-71t40-59t59-39t71-15m832-392v1408H128V0h1024v640zm-509 632q2-14 3-28t1-28q0-14-1-28t-3-28l185-76l-55-134l-185 77q-33-46-79-79l77-185l-134-55l-76 185q-14-2-28-3t-28-1q-14 0-28 1t-28 3l-76-185l-134 55l77 185q-46 33-79 79l-185-77l-55 134l185 76q-2 14-3 28t-2 28q0 14 1 28t4 28l-185 76l55 134l185-77q33 46 79 79l-77 185l134 55l76-185q14 2 28 3t28 2q14 0 28-1t28-4l76 185l134-55l-77-185q46-33 79-79l185 77l55-134z"/></svg>
                            </div>
                            Registros
                        </a>
                        <!-- <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 2048 2048"><path fill="white" d="M896 1537V936L256 616v880l544 273l-31 127l-641-320V472L960 57l832 415v270q-70 11-128 45V616l-640 320v473zM754 302l584 334l247-124l-625-313zm206 523l240-120l-584-334l-281 141zm888 71q42 0 78 15t64 41t42 63t16 79q0 39-15 76t-43 65l-717 717l-377 94l94-377l717-716q29-29 65-43t76-14m51 249q21-21 21-51q0-31-20-50t-52-20q-14 0-27 4t-23 15l-692 692l-34 135l135-34z"/></svg>
                            </div>
                            Inserir Produto
                        </a> -->
                    </nav>
                </div>

            </div>
        
        <?php elseif ($dados["tipoAcesso"] == "func") : ?>
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Funções Funcionário</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Módulos
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <!-- <i class="fas fa-columns"></i> -->
                            <svg class="login" xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 2048 2048"><path fill="white" d="m1344 2l704 352v785l-128-64V497l-512 256v258l-128 64V753L768 497v227l-128-64V354zm0 640l177-89l-463-265l-211 106zm315-157l182-91l-497-249l-149 75zm-507 654l-128 64v-1l-384 192v455l384-193v144l-448 224L0 1735v-676l576-288l576 288zm-640 710v-455l-384-192v454zm64-566l369-184l-369-185l-369 185zm576-1l448-224l448 224v527l-448 224l-448-224zm384 576v-305l-256-128v305zm384-128v-305l-256 128v305zm-320-288l241-121l-241-120l-241 120z"/></svg>
                        </div>
                        Produtos
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="?pagina=listarProdutos">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 2048 2048"><path fill="white" d="M1024 1000v959l-64 32l-832-415V536l832-416l832 416v744h-128V680zm-64-736L719 384l621 314l245-122zm-64 1552v-816L256 680v816zM335 576l625 312l238-118l-622-314zm1073 1216v-128h640v128zm0-384h640v128h-640zm-256 640v-128h128v128zm0-512v-128h128v128zm0 256v-128h128v128zm-128 24h1zm384 232v-128h640v128z"/></svg>
                            </div>
                            Lista de Produtos
                        </a>
                        <a class="nav-link" href="?pagina=adicionarProduto">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 2048 2048"><path fill="white" d="M896 1537V936L256 616v880l544 273l-31 127l-641-320V472L960 57l832 415v270q-70 11-128 45V616l-640 320v473zM754 302l584 334l247-124l-625-313zm206 523l240-120l-584-334l-281 141zm888 71q42 0 78 15t64 41t42 63t16 79q0 39-15 76t-43 65l-717 717l-377 94l94-377l717-716q29-29 65-43t76-14m51 249q21-21 21-51q0-31-20-50t-52-20q-14 0-27 4t-23 15l-692 692l-34 135l135-34z"/></svg>
                            </div>
                            Inserir Produto
                        </a>
                    </nav>
                </div>

                <!-- <div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false"      aria-controls="collapsePages">
                        <div class="sb-nav-link-icon">
                            <svg class="login" xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.8rem" viewBox="0 0 24 24"><path fill="white" d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9A3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42c-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3a3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3a3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.536 5.536 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13zM0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9c-.59.68-.95 1.62-.95 2.65V20zm24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65c2.56.34 4.45 1.51 4.45 2.9z"/></svg>
                        </div>
                        Usuários
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="listUsers.php">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 1024 1024"><path fill="white" d="M704 192h160v736H160V192h160v64h384zM288 512h448v-64H288zm0 256h448v-64H288zm96-576V96h256v96z"/></svg>
                            </div>    
                            Lista de Usuários
                        </a>
                        <a class="nav-link collapsed" href="inforUser.php">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.1rem" height="1.1rem" viewBox="0 0 20 20"><circle cx="10" cy="5.5" r="4.5" fill="white"/><path fill="white" d="M20 16.288v-1.632l-1.012-.168c-.055-.22-.164-.437-.324-.76l-.014-.028l.619-.844l-1.181-1.18l-.844.618a3 3 0 0 0-.788-.338l-.112-1.012h-1.632l-.141.851l-.027.161c-.282.056-.507.17-.788.338l-.844-.619l-1.18 1.181l.562.844c-.106.176-.168.33-.227.49l-.025.07l-.01.027q-.035.096-.076.2L11 14.6v1.631l1.012.17c.057.28.17.505.338.786l-.563.844l.969.969l.213.213l.32-.213l.524-.35c.199.1.443.2.691.3l.05.02l.046.018l.002.012l.167 1h1.687l.167-1l.002-.012c.281-.057.506-.17.787-.338l.477.35l.367.27l1.182-1.182l-.62-.844c.17-.28.282-.563.338-.788Zm-4.5.843a1.66 1.66 0 0 1-1.688-1.687c0-.956.732-1.688 1.688-1.688s1.688.732 1.688 1.688s-.732 1.687-1.688 1.687M10 11c.739 0 1.418.047 2.04.133l-1.594 1.596l.574.862l-1.02.12v3.367l1.098.183l-.598.897l.842.842H2v-3c0-2 2.083-5 8-5"/></svg>
                            </div>
                            Informações
                        </a>
                    </nav>
                </div> -->              
            </div>
        <?php endif; ?>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">
            Usuário: <span class="text-white"><?= $nome;?></span> <br>
            <!-- <hr> -->
            <!-- Sessão: <span class="text-white"><?= $dados["loginAtual"];?></span> -->
        </div>
    </div>
        <!-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?= $nome ?>
        </div> -->
</nav>

