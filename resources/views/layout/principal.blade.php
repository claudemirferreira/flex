<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
   
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
    <title>Controle de Alunos</title>
</head>
<body>
  <div class="container">

   <nav class="navbar navbar-expand-lg navbar-light bg-blue">
        <a class="navbar-brand" href="#">FLEX</a>        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a href="{{action('CursoController@lista')}}" class="navbar-brand">Curso</a>
            </li>
            <li class="nav-item">
              <a href="{{action('ProfessorController@lista')}}" class="navbar-brand">Professor</a>
            </li>
            <li class="nav-item">
              <a href="{{action('AlunoController@lista')}}" class="navbar-brand">Aluno</a>
            </li>
          </ul>
          
        </div>
      </nav>

      @yield('conteudo')

 
  <footer class="footer">
      <p>© Flex Tecnologia.</p>
  </footer>

  </div>
</body>
</html>