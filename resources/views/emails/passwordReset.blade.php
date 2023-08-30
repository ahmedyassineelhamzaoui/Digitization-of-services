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
    text-align: center;
  }

  .form-header p {
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 2rem;
    text-align: center;
  }


  .Ha {
    background-color:green;
    color: orangered;
    text-decoration:none;
    border: none;
    padding: 1rem 2rem;
    border-radius: 0.25rem;
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 1rem;
    width: 100%;
  }

  .Ha:hover {
    background-color: #38a169;
    cursor: pointer;
  }

  /* Styles for the message container */
  .message-container {
    margin-top: 2rem;
    text-align: center;
  }

  .message-container p {
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 0.5rem;
  }

  .message-container p:last-child {
    margin-bottom: 0;
  }

</style>
<div class="form-container">
  <div class="form-header">
    <h2>Mettez à jour votre mot de passe</h2>
    <p>Bonjour {{$name}},<br> nous avons reçu une demande vous invitant à mettre à jour votre mot de passe. Vous pouvez le faire en sélectionnant le bouton ci-dessous. Il vous sera demandé de vérifier votre identité, puis vous pourrez mettre à jour votre mot de passe.</p>
    <a class="Ha"  href="{{ route('change.passwordpage', $token) }}" >
        Mettre à jour
    </a>
    <div class="message-container">
      <p>Si vous n'avez pas fait cette demande, vous n'avez rien à faire.</p>
      <p>Merci, l'équipe <span style="color:orangered;font-weight:bold">Son<span style="color: green">apie</span></span></p>
    </div>
  </div>
</div>