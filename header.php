<header>

    <div class="jumbotron m-0">
        <div class="container">

            <div class="media">
                <a href="."><img src="interface/logo-o.png" class="mr-3 align-self-center" style="width: 70px;"></a>
                <div class="media-body">
                    <h1 class="display-4">Времена года</h1>
                </div>
            </div>
            
            <p class="lead">
            
                <?php

                    $arr = array( 
                            'Прелесть весны познается только зимою, когда, сидя у печки, сочиняешь майские песни.',
                            'Зимой чем сильнее морозы, тем теплее друг к другу становимся мы.',
                            'Осень – это время года, после которого сразу начинается ожидание весны.',
                            'Летом очень жарко заниматься вещами, которыми заниматься зимой было очень холодно.'
                        );

                    $key = array_rand( $arr );

                    echo $arr[$key];
                
                ?>
            
            </p>
        
        </div>
    </div>
        
    <div class="container-fluid">
        <div class="row">
            <div class="col p-4 text-white text-center" style="background-color: #5E6977;">
                <p class="h4">Хотите узнать больше?</p>
            </div>
        </div>
    </div>

</header>
