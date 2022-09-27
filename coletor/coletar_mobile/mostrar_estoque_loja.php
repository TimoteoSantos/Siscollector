<?php
                    //estoque / loja
                    $estoque = mysqli_query($conexao, "SELECT estoque_loja from config where estoque_loja > 0 limit 1 ");

                    //o while repete a criaçao de linhas na tabela igual a quantidade de itens.
                    while($varrer = mysqli_fetch_array($estoque)) {
                    $estoque_ver = $varrer['0'];

                              
                              switch ($estoque_ver) {
                                
                                case '1':

                                  echo "Coleta estoque";
                                  break;

                                case '2':

                                  echo "Coleta loja";
                                  break;
                                
                                default;
                                echo "Coleta avulsa";
                                break;
                                

                                }
                        }//fim do estoque / loja
                    ?>