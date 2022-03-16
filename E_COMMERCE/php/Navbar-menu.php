<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Criado por Team Senac First Craker's">

    <title>Navbar-menu</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico">
    <!---Font Awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="./assets/css/navbar-menu.css">
    <!-- responsive -->
    <link rel="stylesheet" href="./assets/css/responsive.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>    
    <header>
        
        <div class="full-width search">
            <div class="search-form">
                <input type="text" name="" placeholder="pesquisar...">
                <div class="close"><i class="fa fa-times" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="logo">Logo</div>
        <nav>
            <ul>
                <li class="sub-menu"><a href="#">Produtos</a>
                <ul>
                    <li><a href="../view/form_produto.php">Cadastrar</a></li>
                    <li><a href="#">Listar</a></li>
                </ul>
                </li>             
                <li class="sub-menu"><a href="#">Clientes</a>
                    <ul>
                        <li><a href="../view/form_cliente.php">Cadastrar</a></li>
                        <li><a href="#">Listar</a></li>
                    </ul>
                </li>                
                <li class="sub-menu"><a href="#">Vendas</a>
                    <ul>
                        <li><a href="../view/form_vendas.php">Cadastrar</a></li>
                        <li><a href="#">Listar</a></li>
                    </ul>
                </li>      
                <li><a class="search-icon"><i class="fa fa-search" aria-hidden="true"></i>
                </a></li>           
            </ul>      
            <div style="clear:both"></div>      
        </nav>
        <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
    </header>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.menu-toggle').click(function(){
                $('nav').toggleClass('active')
            })
            $('ul li').click(function(){
                $(this).siblings().removeClass('active');
                $(this).toggleClass('active')
            })
        })
        
        $(document).ready(function(){
            $('.search-icon').click(function(){
                $('.search').slideToggle()
            })
            
            $('.close').click(function(){
                $('.search').slideToggle()
            })
        })

    </script>
     <!-- bootstrap -->
     <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>