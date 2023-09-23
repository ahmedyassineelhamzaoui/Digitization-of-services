<style>
  /* Style for the form container */
  .form-container {
    background-color: white;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 4rem;
  }

  /* Styles for the header */
  .form-header h2 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 1rem;
    text-align: start;
  }

  .form-header p {
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 2rem;
    text-align: start;
  }

  .btn {
    background-color: rgb(231,123,32);
    color: rgb(65,157,95);
    border: none;
    padding: 1em 2em;
    border-radius: 0.25em;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
  }
  .cord{
      margin-top:1em;
  }
  .image{
      width:200px;
      height:50px;
  }
  .image img{
      width:100%;
  }
</style>
<div class="form-container">
   
  <div class="form-header">
   <div class="image">
      <img src="{{asset('assets/images/logo/removebg.png')}}" >
   </div>
    <h3>Bonjour, {{$name}}</h3> 
    @if($operation != 'accepter')
    <p> Nous regrettons de vous informer que votre demande d'attestation de non logement a été refusée. Nous comprenons que cela puisse être décevant, et nous vous remercions pour votre intérêt.
        La raison du refus est la suivante : {{$message}}.
    </p>
    <p>
        Nous sommes là pour vous aider et vous guider vers une demande future réussie. Si vous avez des questions ou si vous avez besoin de clarifications, n'hésitez pas à nous contacter.
    </p>
    <a class="btn" href="{{route('demande')}}">Contacter-Nous</a>
                    
    @else
       <p>Nous sommes ravis de vous informer que votre demande d'attestation de non logement a été approuvée avec succès ! Félicitations !
        vous pouvez Télécharger votre demande ici: <a href="{{ asset($path) }}">Télécharger</a></p>
        <p>Si vous avez des questions supplémentaires, n'hésitez pas à nous contacter. 
        </p>
          <a class="btn" href="{{route('demande')}}">Contacter Nous</a>
    @endif
    <p class="cord">
      Cordialement,
      L'équipe  <b style="color: green"><span style="color:orangered">Son</span>apie</b> 
   </p>
  </div>  

  

  