<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>ACME Inc.</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Amon T. B. da Silva">
        <meta name="description" content="ACME Inc. - trap, pitfall, snare, and so on">
        <link rel="stylesheet" media="screen and (max-width: 500px)" href="/acme/css/main.css">
        <link rel="stylesheet" media="screen and (min-width: 501px)" href="/acme/css/large.css">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    </head>
    <body>
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
        </header>

        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/nav.php'; ?> 
            <?php // echo $navList; ?>
        </nav>

        <main id="mainHome">
            <h1>Welcome to Acme!</h1>
            <div id="invProdContainer">
                    <?php echo $featMainDisplay; ?>
                <!--<section id='hero'>
                  <img src="/acme/images/products/anvil.png" alt="what is happen?">
                                    <ul>
                                        <li><h2>Acme Rocket</h2></li>
                                        <li>Quick lighting fuse</li>
                                        <li>NHTSA approved seat belts</li>
                                        <li>Mobile launch stand included</li>
                                        <li><a href="#"><img id="iWant" alt="Add to cart button" src="images/site/iwantit.gif"></a></li>
                                    </ul>
                </section>
                <section id="commentList">
                    <h2>Acme Rocket Reviews</h2>
                    <ul>
                        <li>"I don't know how I ever caught roadrunners before this."(4/5)</li>
                        <li>"That thing was fast!"(4/5)</li>
                        <li>"Talk about fast delivery."(5/5)</li>
                        <li>"I didn't even have to pull the meat apart."(4.5/5)</li>
                        <li>"I'm on my thirtieth one. I love these things!"(5/5)</li>
                        <li id='iWantLi'><a href="#"><img id="iWantImg" alt="Add to cart button" src="images/site/iwantit.gif"></a></li>
                    </ul>
                </section>-->
            </div>
            

            <div id="homeContainer">


                <section id="recipes">
                    <h2>Featured Recipes</h2>
                    <?php echo $featDisplay; ?>
                    <!--                    <figure>
                                            <img src="images/recipes/bbqsand.jpg" alt="Pulled Roadrunner BBQ">
                                            <a href="#">Pulled Roadrunner BBQ</a>
                                        </figure>
                                        <figure>
                                            <img src="images/recipes/potpie.jpg" alt="Roadrunner Pot Pie">
                                            <a href="#">Roadrunner Pot Pie</a>
                                        </figure>
                                        <figure>
                                            <img src="images/recipes/soup.jpg" alt="Roadrunner Soup">
                                            <a href="#">Roadrunner Soup</a>
                                        </figure>
                                        <figure>
                                            <img src="images/recipes/taco.jpg" alt="Roadrunner Taco">
                                            <a href="#">Roadrunner Taco</a>
                                        </figure>-->
                </section>

            </div>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/acme/common/footer.php"; ?>
        </footer>
    </body>
</html>