<?php

print_r($_POST);
 

//controlla se la variabile post contine il valore name assegnato al button del form, se lo contiene vuol dire che il tasto è 
//stato premuto (questo è un modo utile per gestire la pressione del tasto submit lato php, in javascript si usa un altro modo)
if(array_key_exists("avvio",$_POST)){
     if($_POST['basic-url'] != ""){
         
         $url = $_POST['basic-url'];
   

            $link_collegamento=mysqli_connect("sdb-c.hosting.stackcp.net","nome_dominio-3137316ef6","mvi1twncmf","nome_dominio-3137316ef6");
        if(mysqli_connect_error()){
        die("è presente un errore di collegamento al database, riprova");    
        }
        
        $query_da_inviare = "SELECT url_name FROM url WHERE url_name = '".mysqli_real_escape_string($link_collegamento, $url)."'";

            $risultato = mysqli_query($link_collegamento,$query_da_inviare);
            $io = mysqli_num_rows($risultato);

            if ($io > 0){

                     $error = "<div class='alert alert-danger' role='alert'>"."Attenzione, il dominio \"http://www.webbyone.com/".addslashes($url)."\" è gia in uso, scegli un altro nome per la tua pagina web"."</div>"; 
                
                $prova = "<script>"."document.getElementById('step1').disabled = true;"."</script>";
        
                //die ("email gia presente nel database, riprova");
            }


        else{
            
         $error = "<div class='alert alert-info' role='alert'>"."Il dominio \"http://www.webbyone.com/".addslashes($url)."\" è disponibile!"."</div>";  
            
            $prova = "<script>"."document.getElementById('step1').disabled = false;"."</script>";
            // $prova = "<script>"."alert ('suca');"."</script>";

        }


        } 
            

}
        ?>



<!doctype html>
<html lang="en">
  <head>
    <title>Disegna il tuo sito web!</title>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


              <meta name="keywords" content="creare sito web, fare sito web, comprare sito web, web site, sito web economico, sito web facile"/>
              <meta name="description" content="Crea il tuo sito web a soli 19 euro e paga soltando se sei soddisfatto del lavoro! Disegna tu il tuo sito web o scegli uno dei nostri temi, riceverai entro sette giorni il link del tuo sito gia online! Solo a questo punto deciderai se tenerlo oppure no "/>
              <meta name="author" content="Angelo Gianfreda">
              <meta name="google-site-verification" content="......"/>
              <meta name="siteType" value="Website Pro"/>
      
      
      
      <!-- Bootstrap aggiuntivo -->
       <!-- MDB icon -->
 <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="stile.css" rel="stylesheet">
      
      
        <!-- jquery -->
      <link rel="stylesheet" href="jquery-ui.css">
       <!-- <link rel="stylesheet" href="/resources/demos/style.css">-->    
      
      
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   

      
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    
<header>
 
        
         <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <!-- Container wrapper -->
  <div class="container-fluid">
          <a class="navbar-brand" href="#">Webbyone.com</a>
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarRightAlignExample"
      aria-controls="navbarRightAlignExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
        
        
        
        
         
  <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarRightAlignExample">
      <!-- Left links -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contatti</a>
        </li>
        <!-- Navbar dropdown -->
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            Crea il tuo sito
          </a>
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="create_site.html">Standard Web Site</a></li>
            <li><a class="dropdown-item" href="#">Professional Web Site</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#">Advanced web site</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gallery</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
</header>
      
                 

      
   <div class = "container"> 

        <p class="fs-1 text-center">Simple site web</p>
       <p class="fs-4 text-center">Compila il modulo e invia la richiesta, otterrai sul tuo indirizzo email il link del sito web gia online entro massimo 7 giorni!</p>
    
        <br>
       <br>
       
       <div class="card card-body">
     <form id="form1" class="row g-3" method="post">
          <p class="fs-4">Impostazione URL</p>
           <label for="basic-url" class="form-label fw-bold">Ogni grande idea ha bisogno di un nome. Controlla la disponibilità e imposta il nome per la tua pagina web</label>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon3">http://webbyone.com/</span>
          <input type="text" style="height: 38px" class="form-control" id="basic-url" name="basic-url" aria-describedby="basic-addon3" aria-describedby="button-addon2" value="<?php echo addslashes($url); ?>" required>
            <button class="btn btn-success" type="submit" id="button-addon2" name = "avvio">ok</button>

        </div>
          
        <div id="errore">
         <?php echo $error; ?>
         </div>
         
    <div class="d-flex justify-content-center">
         <button id="step1" class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" disabled>
    Impostazione web page
  </button>
         </div>
       </form>
       </div>
         
    <br>
       
       <form id="form2" class="row g-3" method="post"> 
<div class="collapse" id="collapseExample">
  <div class="card card-body">
       
         
          <p class="fs-4">Impostazioni e struttura della web page</p>
      <br>
      <br>
         <div class="col-md-8">
          <label class= "fw-bold" for="flexRadioDefault" class="form-label">compila le informazioni per la truttura del sito</label>
          </div>
             <div class="col-md-8">
            <label for="validationDefault01" class="form-label">Nome</label>
            <input type="text" class="form-control" id="validationDefault01" name="validationDefault01" onchange="myFunction()" required>
          </div>
      
          <div class="col-md-8">
            <label for="validationDefault02" class="form-label">Cognome</label>
            <input type="text" class="form-control" id="validationDefault02" name="validationDefault02"  onchange="myFunction()" required>
          </div>
     <br>
      <br>
      <div class="col-md-8">
          <label class= "fw-bold" for="flexRadioDefault" class="form-label">Invia un file contenente la struttura della pagina web o scegli uno dei nostri temi</label>
          </div>
           <div class="col-md-8">
         <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onchange="Functioninviafile()">
          <label class="form-check-label" for="flexRadioDefault1">
            Invia un file/disegno contenente la struttura della pagina web
          </label>
             
        </div>
                  
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onchange="Functioninviafile()">
          <label class="form-check-label" for="flexRadioDefault2" >
            Scegli uno dei nostri temi disponibili
          </label>
        </div>
           <!-- 
           <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" onchange="Functioninviafile()">
          <label class="form-check-label" for="flexRadioDefault3">
            Utilizza il nostro editor di creazione a griglia
          </label>
        </div>
Container wrapper -->
      </div>
      
      <br>
  <div id="caso1"  hidden>
      <div class="mb-3">
          <label for="formFile" class="form-label">Default file input example</label>
          <input class="form-control" type="file" id="formFile">
        </div>
      </div>
      
        <div id="caso2" class="card card-body" hidden>
      
      
          
            <!-- inizio gallery -->
             <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> 
                 
        <div class="col">
          <div class="card shadow-sm">
              <img class="img-fluid img-thumbnail" src="img/woman2.png">
            <div class="card-body">
              <p class="card-text text-center">questo è un testo di prova</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-sm btn-outline-secondary">seleziona</button>
                     <button type="button" class="btn btn-sm btn-outline-secondary">vedi</button>
                </div>
              </div>
            </div>
          </div>
        </div> 
   
        <div class="col">
          <div class="card shadow-sm">
              <img class="img-fluid img-thumbnail" src="img/woman2.png">
            <div class="card-body">
              <p class="card-text text-center">questo è un testo di prova</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-sm btn-outline-secondary">seleziona</button>
                     <button type="button" class="btn btn-sm btn-outline-secondary">vedi</button>
                </div>
              </div>
            </div>
          </div>
        </div> 
                 
     <div class="col">
          <div class="card shadow-sm">
              <img class="img-fluid img-thumbnail" src="img/woman2.png">
            <div class="card-body">
              <p class="card-text text-center">questo è un testo di prova</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-sm btn-outline-secondary">seleziona</button>
                     <button type="button" class="btn btn-sm btn-outline-secondary">vedi</button>
                </div>
              </div>
            </div>
          </div>
        </div> 
                      <div class="col">
          <div class="card shadow-sm">
              <img class="img-fluid img-thumbnail" src="img/woman2.png">
            <div class="card-body">
              <p class="card-text text-center">questo è un testo di prova</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-sm btn-outline-secondary">seleziona</button>
                     <button type="button" class="btn btn-sm btn-outline-secondary">vedi</button>
                </div>
              </div>
            </div>
          </div>
        </div> 
                 
                      <div class="col">
          <div class="card shadow-sm">
              <img class="img-fluid img-thumbnail" src="img/woman2.png">
            <div class="card-body">
              <p class="card-text text-center">questo è un testo di prova</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-sm btn-outline-secondary">seleziona</button>
                     <button type="button" class="btn btn-sm btn-outline-secondary">vedi</button>
                </div>
              </div>
            </div>
          </div>
        </div> 
                 
                      <div class="col">
          <div class="card shadow-sm">
              <img class="img-fluid img-thumbnail" src="img/woman2.png">
            <div class="card-body">
              <p class="card-text text-center">questo è un testo di prova</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group mx-auto">
                  <button type="button" class="btn btn-sm btn-outline-secondary">seleziona</button>
                     <button type="button" class="btn btn-sm btn-outline-secondary">vedi</button>
                </div>
              </div>
            </div>
          </div>
        </div> 
 
                 
            </div> 
      </div>
            
      
       <!-- inizio caso 3 - sistema d igriglia-->
        <div id="caso3" class="card card-body" hidden>
      
      sistema a grigliaaa
            <div  class="container img-fluid">
                
              <div  class="row" >
                <div  class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div  class="col selettore cornice3">
                 
                </div>
                  <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                  <div class="row" >
                <div class="col selettore cornice3">
                 
                </div>
                <div  class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                  
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
                  <div class="col selettore cornice3">
                
                </div>
                  <div class="col selettore cornice3">
               
                </div>
                  <div class="col selettore cornice3">
                 
                </div>
              </div>
                
                
                
                
           
                
            </div>
      </div>
      <!-- fime caso 3 - sistema d igriglia-->
    
             <br>
               <div class="d-flex justify-content-center">
         <button id="step2" class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" disabled>
    Info e Contatti
  </button>
         </div>
             
         
           
    </div>
       </div>
      
       
       <div class="collapse" id="collapseExample2">
  <div class="card card-body">
       
             
       <p class="fs-4">Dati anagrafici e contatti</p>
    
       
          <div class="col-md-6">
            <label for="validationDefault03" class="form-label">Nome</label>
            <input type="text" class="form-control" id="validationDefault03" name="validationDefault01"  required>
          </div>
          <div class="col-md-6">
            <label for="validationDefault04" class="form-label">Cognome</label>
            <input type="text" class="form-control" id="validationDefault04" name="validationDefault02"  required>
          </div>
          <div class="col-md-7">
            <label for="validationDefaultEmail" class="form-label">Email</label>
            <div class="input-group">
              <input type="email" class="form-control" id="validationDefaultEmail" placeholder="webbyone@gmail.com" aria-describedby="inputGroupPrepend2" name="validationDefaultEmail" required>
            </div>
          </div>
          <div class="col-md-5">
            <label for="validationDefault05" class="form-label">Telefono</label>
            <input type="numeric" class="form-control" id="validationDefault05" required>
          </div>
            <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" name="invalidCheck2" required>
              <label class="form-check-label" for="invalidCheck2">
                Accetto i termini e le condizioni
              </label>
            </div>
          </div>
      <br>
              <div class="col-12">
            <button class="btn btn-primary" type="submit">Invia</button>
          </div>
             
          
       
                  
        </div>
    </div>
 </form>
       
         <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
      
       <!-- Bootstrap aggiuntivo  js-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
      <script type="text/javascript" src="lavagna.js"></script>
       
       
       
   </div>
      
      <div id="script">
           <?php echo $prova; ?>
      </div>
  
      <script>
          function  myFunction(){
             
          if(document.getElementById('validationDefault01').value != "" && document.getElementById('validationDefault02').value != "")
          {
               
             document.getElementById('step2').disabled=false;
             }else{
               document.getElementById('step2').disabled=true;  
             };
          };
          
      </script>
      
      <script>
      function Functioninviafile(){
          
          if(document.getElementById('flexRadioDefault1').checked == true){
              //alert("checked uguale a true");
             document.getElementById('caso1').hidden = false;
             // document.getElementById('caso1').fadeOut(2000);
              document.getElementById('caso2').hidden = true;
            //  document.getElementById('caso3').hidden = true;
             };
           if(document.getElementById('flexRadioDefault2').checked == true){
              //alert("checked uguale a true");
             document.getElementById('caso2').hidden = false;
              document.getElementById('caso1').hidden = true;
             // document.getElementById('caso3').hidden = true;
             };
           if(document.getElementById('flexRadioDefault3').checked == true){
              //alert("checked uguale a true");
             //document.getElementById('caso3').hidden = false;
              document.getElementById('caso1').hidden = true;
              document.getElementById('caso2').hidden = true;
             };
          
      };
           
      </script>
      
      <script>
  
        var IS_MOUSE_DOWN = false;

        $(document).on('mouseup', () => {IS_MOUSE_DOWN = false});

        
        $('.selettore').on('mouseenter mousedown', e => {
          const eventType = e.type;
          const $element = $(e.currentTarget);
          // se l'evento catturato è 'mousedown' imposto la variabile isMouseDown su 'true'
          if (eventType == 'mousedown') IS_MOUSE_DOWN = true;
          // se isMouseDown è 'true' eseguo il cambio di classe dell'elemento
          IS_MOUSE_DOWN && $element.toggleClass('cornice2 cornice3');
        });
                
      </script>

      
      
      
      <script>
           /*
            
               $("form").submit(function(e){  
                    e.preventDefault();
                   alert("ciao");
                   var error = "";
                        if ($("#validationDefaultEmail").val()) == ""{
                                error += "<p>manca l'indirizzo email<br></p>";
                      
                   } 
                   //se la variabile error è diversa da vuoto quindi è stata riempita con degli errori...
                   if(error != ""){
                       
                       //rendiamo il tag div che elenca gli errori con le classi di bootstrap e  aggiungiamo l'errore
                     $("#errore").html("<div class='alert alert-danger' role='alert'>"+ error + "</div>");
                       
                       return false;
                   }
                   else{
                      
                       //return true;
                      $("form").unbind('sumbit').submit();
                   }
                    });
               
                */   
      </script>
      
      


  
      
      
      
  </body>
</html>

 



