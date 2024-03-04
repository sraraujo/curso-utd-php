<?php

    class LibHtml{

        public static function abrirTag($tag){
            echo "<$tag>";
        }

        public static function fecharTag($tag){
            echo "</$tag>";
        }

        public static function escrever($texto){
            echo $texto;
        }

        public static function criarTabela($array, $atributos=null, $links=null){

            $titles = array_keys($array[0]);

            self::abrirTag("div class='container'");
                self::abrirTag("div class='row'");
                    self::abrirTag("div mt-5'");

                        self::abrirTag('table class="table table-responsive table-bordered table-hover table-striped" id="datatablesSimple"', $atributos);
                            self::abrirTag("thead");
                                self::abrirTag("tr");
                                    foreach ($titles as $title):
                                        self::abrirTag("th");
                                            self::escrever(ucfirst($title));
                                        self::fecharTag("th");
                                    endforeach;
                                self::fecharTag("tr");

                                if(!is_null($links)){
                                    self::abrirTag("th");
                                        self::escrever("Ações");
                                    self::fecharTag("th");
                                }

                            self::fecharTag("thead");

                            self::abrirTag("tbody");
                                foreach ($array as $data):
                                    self::abrirTag("tr");
                                        foreach ($titles as $title):
                                            self::abrirTag("td");
                                                self::escrever($data[$title]);
                                            self::fecharTag("td");
                                        endforeach;
                                        
                                        if(!is_null($links)){
                                            self::abrirTag("td class='mr-5'");
                                                foreach ($links as $link):
                                                    self::escrever($link);
                                                endforeach;
                                            self::fecharTag("td");
                                        }

                                    self::fecharTag("tr");
                                endforeach;
                            self::fecharTag("tbody");
                        self::fecharTag("table");

                    self::fecharTag("div");
                self::fecharTag("div");
            self::fecharTag("div");

        }

    }

?>