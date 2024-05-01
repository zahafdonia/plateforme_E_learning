<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinez un formateur</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

.bg-modal {
	background-image:linear-gradient(to right,#1105528a,  #63022981) , url(kb.jpg) ;
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	display: none;
	justify-content: center;
	align-items: center;
}

.modal-contents {
    margin-top: 30px;
	height: 750px;
	width: 550px;
	background-color: white;
	text-align: center;
	padding: 15px;
	position: relative;
	border-radius: 4px;
    display: flex;
    flex-direction: column;
}

input {
	margin: 15px auto;
	display: block;
	width: 40%;
	padding: 8px;
	border: 1px solid gray;
}

.button {
	background-color: #630229;
	border: 2px solid white;
	border-radius: 30px;
	text-decoration: none;
	padding: 10px 28px;
	color: white;
	margin-top: 10px;
	display: inline-block;
	&:hover {
		background-color: #1105528a;
		color: blue;
		border: 2px solid blue;
	}
}


.close {
	position: absolute;
	top: 0;
	right: 10px;
	font-size: 42px;
	color: #333;
	transform: rotate(45deg);
	cursor: pointer;
	&:hover {
		color: #666;
	}
}
    </style>
</head>
<body>

<header id="header">
    <nav>
        <img src="images/icon/iteam.jpg" alt="logo" class="logo">
        <ul>
            <li><a class="active" href="">Home</a></li>
            <li><a href="#about">about us</a></li>
            <li><a href="#cours">courses</a></li>
            <li><a href="#services_section">Services</a></li>
            <li><a href="#calendar_section">formation</a></li>
            <li><a href="#contactus_section">Contact</a></li>
        </ul>
        <div class="srch"><input type="text" class="search" placeholder="Search here..."><img src="images/icon/search.png" alt="search"></div>
        <img src="images/icon/menu.png" class="menu" alt="menu">
    </nav>

    <div class="head-container">
        <div class="quote">
            <br><br><br>
            <p>Ayez un impact global</p>
            <p style="font-size:20px">Construisez votre cours en ligne et monétisez votre expertise en partageant votre savoir partout dans le monde.</p>
            <a href="#" id="button" class="button">Devinez un formateur </a>
        </div>
        
    </div>
     

<div class="service-swipe">
    <div class="diffSection">
        <div >
            <div >
                <center>
                    <p style="font-size: 45px; padding-top: 30px; padding-bottom: 20px;color: #2e2e2e;">Il y a tant de raisons de se lancer </p>
                </center>
            </div>
        </div>
        <div>
            <div class="totalcard">
                <div class="card">
                    <center>
                        <img src="images/tab.png" alt="" width="60px" class="mb-4">
                        <h5  class="card-title">Créez des cours qui vous ressemblent</h5>
                        <p style="padding-bottom: 30px;">Publiez le cours que vous voulez, comme vous voulez, et gardez toujours le contrôle sur votre propre contenu.</p>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <img src="images/think.jpg" alt="" width="60px" class="mb-4">
                        <h5 class="card-title">Inspirez les participants</h5>
                        <p style="padding-bottom: 30px;">Enseignez ce que vous savez et aidez les participants à explorer leurs intérêts, à acquérir de nouvelles compétences et à faire progresser leur carrière.</p>
                    </center>
                </div>
                <div class="card">
                    <center>
                        <img src="images/coupe.jpg" alt="" width="60px" class="mb-4">
                        <h5 class="card-title">Soyez récompensé</h5>
                        <p style="padding-bottom: 30px;">Développez votre réseau professionnel et votre expertise, et gagnez de l'argent pour chaque inscription payante.</p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</header> 
<br><br><br><br><br><br><br><br><br><br><br>

<div class="bg-modal">
	<div class="modal-contents">
    <center>
        <br>
        <h1 style="margin-top: 100px;">Devenir Formateur</h1>
    </center>
		<div class="close">x</div>
   
    <form class="row" action=""  style="margin-top: 50px;" >
        <label for="username">Nom Complet :</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
        <label for="specialite">Spécialité :</label>
        <input type="text" id="specialite" name="specialite" required><br>

        <label for="experience">Expérience :</label>
        <input type="text" id="experience" name="experience" required><br>

        <label for="cv">CV :</label>
        <input type="file" id="cv" name="cv" accept=".pdf, .doc, .docx" required><br>

        <a href="#" class="button">Postuler</a>
    </form>

</div>
</div>
<br>


<footer>
    <div class="footer-container">
    <div class="left-col">
				<img src="images/icon/iteam.jpg" style="width: 100px;">
				<div class="logo"></div>
				<div class="social-media">
					<a href="#"><img src="images/icon\fb.png"></a>
					<a href="#"><img src="images/icon\insta.png"></a>
					<a href="#"><img src="images/icon\tt.png"></a>
					<a href="#"><img src="images/icon\ytube.png"></a>
					<a href="#"><img src="images/icon\linkedin.png"></a>
				</div><br><br>
				<p class="rights-text">web devoloped by Zahaf Donia and Drira Habib</p>
				<br><p><img src="images/icon/location.png"> Lovely Professional University<br>85-87 Rue Palestine 1002 Tunis</p><br>
				<p><img src="images/icon/phone.png"> +216 22 022 444<br><img src="images/icon/mail.png">&nbsp; info@iteam-univ.tn</p>
			</div>
			<div class="right-col">
				<h1 style="color: #fff">Our Newsletter</h1>
				<div class="border"></div><br>
				<p>Enter Your Email to get our News and updates.</p>
				<form class="newsletter-form">
					<input class="txtb" type="email" placeholder="Enter Your Email">
					<input class="btn" type="submit" value="Submit">
				</form>
			</div>
		</div>
    </div>
</footer>

<script>
document.getElementById('button').addEventListener("click", function() {
	document.querySelector('.bg-modal').style.display = "flex";
});

document.querySelector('.close').addEventListener("click", function() {
	document.querySelector('.bg-modal').style.display = "none";
});
</script>

</body>
</html>

