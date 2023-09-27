<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retro Hunters Support</title>
    <style>
        body{
            font-family:Arial, Helvetica, sans-serif;
            background-color: #eaeaea;
            padding: 10px 10px;

        }   
        .bodyMail{
            display: flex;
            align-items: center;
            flex-direction: column;
            padding: 30px;
        }
        .card{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #ffba18;
            width: 500px;
            height: auto;
            padding: 20px;
            border-radius: 20px;
        }
        .btn{
            height: 20px;
            background: green;
            font-size: 20px;
            color: white;
            text-decoration: none;
            padding: 20px;
            border-radius: 20px;
        }
        .data{
            font-weight: bold
        }
        .dataBox{
            display: flex;
        }
        .dataBox2{
            margin: 20px;
            width: 50%;
        }
        .dataBox3{
            margin: 20px;
            padding:0px 20px;
            text-align: justify

        }
    </style>
</head>
<body>
    <div class="bodyMail">
        <div>
            <h2>Un utente si è candidato al ruolo di revisore</h2>
        </div>
        <div class='card'>
            <p>Ciao, <br>
                <br>
                Ti informiamo che un utente si è appena candidato per il ruolo di revisore sul nostro sito. Di seguito sono riportati i dettagli della candidatura:
                <br>
                <br>
                <div class="dataBox">
                    <div class="dataBox2"><p class="data">Nome dell'Utente:</p><span>{{Auth::user()->name}}</span><br></p></div>
                    <div class="dataBox2"><p class="data">Email dell'Utente:</p><span>{{Auth::user()->email}}</span><br></p></div>
                    
                </div>
                <div class="dataBox3"><p class="data">Messaggio dell'Utente:</p><span>{{$presentation_message}}</span><br></p></div>
                
                <br>
                Per favore, prendi in considerazione questa candidatura e procedi con la valutazione del candidato per determinare se è adatto al ruolo di revisore. <br>
                <br>
                Se desideri visualizzare ulteriori dettagli sulla candidatura o intraprendere azioni specifiche, accedi al pannello di amministrazione del sito o contatta il candidato all'indirizzo email fornito. <br>
                <br>
                Grazie per il tuo impegno nel migliorare il nostro sito e per il tuo lavoro nella selezione del candidato ideale per il ruolo di revisore. <br>
                <br>
                Cordiali saluti. <br>
                
                </p>
            {{-- <p>Messaggio: {{$p_message}}</p> --}}
            <p>Se vuoi renderlo revisore clicca qui</p>
            <a class="btn" href="{{route('make.revisor', Auth::user())}}">Rendi revisore</a>
        </div>
        
</body>
</html>