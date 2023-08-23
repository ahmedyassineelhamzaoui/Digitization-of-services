<style>
    /* Style for the form container */
    .form-container {
      background-color: #f7fafc;
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
  
    /* Styles for the form */
    form {
      background-color: #ffffff;
      padding: 2rem;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 0.5rem;
      width: 100%;
      max-width: 30rem;
      display: flex;
      justify-content: center;
    }
  
    form a {
      background-color: #ffae00;
      color: #ffffff;
      border: none;
      padding: 1rem 2rem;
      border-radius: 0.25rem;
      font-size: 1rem;
      font-weight: bold;
      margin-bottom: 1rem;
      width: 100%;
    }
  
    form a:hover {
      background-color: #eba205;
      cursor: pointer;
    }
  
    /* Styles for the message container */
    .message-container {
      margin-top: 2rem;
    }
  
    .message-container p {
      font-size: 1rem;
      line-height: 1.5;
      margin-bottom: 0.5rem;
    }
  
    .message-container p:last-child {
      margin-bottom: 0;
    }
    .download-pdf{
        background-color: #015163 ;
        padding: 8px 10px;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
    .download-pdf:hover{
        background-color: #0694b4;
        color: #fff;
        border-radius: 5px;
    }
  </style>
  <div class="form-container">
    <div class="form-header">
      <h2>Bonjour, {{$user->full_name}}</h2>
      <p>Merci d'avoir soumis votre demande</p>
      <p>Votre demande est en cours d'examen par notre équipe. Après avoir examiné votre demande, nous l'accepterons ou la déclinerons.</p>
      <p>Vous recevrez un e-mail dès qu'une décision aura été prise concernant votre demande. Vous pouvez également suivre l'état de votre demande en cliquant sur le bouton ci-dessous.</p>
    </div>
    <div>
      <form>
        <div>
          <a href="{{route('demande')}}" >Ma demande </a>
        </div>
      </form>
    </div>

    