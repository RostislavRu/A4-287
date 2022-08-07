<!DOCTYPE html>
<html  lang="en">
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="Q5.css">
        <script type="text/javascript" src="Q5.js"></script>
    </head>
    <?php include 'Header.php'; ?>
    <body>
        <ul class="ml">
            <li><a href="Home.php" class="active">Home Page</a></li>
            <li><a href="create.php">Create Account</a></li>
            <li><a href="log.php">Login</a></li>
            <li><a href="FindPet.php">Find a dog/cat</a></li>
            <li><a href="DogCare.php">Dog Care</a></li>
            <li><a href="CatCare.php">Cat Care</a></li>
            <li><a href="Give.php">Have a pet to give away?</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
        </ul>
        <div class="content">
            <h2>WELCOME TO THE PET ADOPTION WEBSITE</h2>
            <div>
                Hello, welcome to the Concordia pet adoption center where you can browse pets for adoption, search for specific pets, find Information on how to take care of your pets and give up a pet for adoption. For any inquiries, please visit the contact page. 
                At the moment, we only have cats and dogs for adoption.
            </div>
            <div>
                <br/>
                <span class = bold>Examples of available pets</span>
                <table>
                    <tr>
                        <td><a href="https://www.reddit.com/r/standardissuecat/comments/pjupvd/my_sic_doing_sic_things/" target="_blank" rel="noreferrer noopener"><img src="sic.webp" height="500" width="400"/></a></td>
                        <td><a href="https://www.reddit.com/r/CasualConversation/comments/e6ilh5/i_hope_my_dog_knows_how_much_i_love_him/" target="_blank" rel="noreferrer noopener"><img src="dog1.webp" height="500"/></a></td>
                        <td id="doubleimg">
                            <a href="https://www.hindustantimes.com/trending/cat-tries-hard-to-convince-dog-that-it-is-snuggle-time-watch-funnily-cute-video-101649246996835.html" target="_blank" rel="noreferrer noopener"><img src="catdog.jfif" height="250"/></a>
                            <a href="https://www.whycatwhy.com/cute-cat-monday-reddit-edition/" target="_blank" rel="noreferrer noopener"><img src="cat2.jfif" height="250" width="444"/></a>             
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
    <?php include 'Footer.php'; ?>
</html>