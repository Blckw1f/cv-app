<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CV</title>

        <!-- Styles -->
        <style>
            main{
                border-style: solid;
                margin: 100px 500px;
                padding: 10px 10px;
                display: flex;
                flex-direction: column;
            }
            header{
                text-align: center;
                margin-top: 50px;
                font-size: 40px;
            }
            .hidden{
                display: none;
                margin: 10px 10px;
                padding: 10px 10px;
                border-style: solid;
                border-width: thin;
            }
            #buttonSave{
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div>
            <div>
                <div>
                    <header>
                        Създаване на CV
                    </header>

                    <main class="mt-6">
                        <form action="/cv" method="POST">
                            @csrf
                            <label for="first_name">Име</label>
                            <input name="first_name" id="first_name">
                            <br>
                            <br>
                            <label for="second_name">Презиме</label>
                            <input name="second_name" id="second_name">
                            <br>
                            <br>
                            <label for="third_name">Фамилия</label>
                            <input name="third_name" id="third_name">
                            <br>
                            <br>
                            <label for="birth_date">Дата на раждане</label>
                            <input type="date" id="birth_date" name="birth_date" />
                            <br>
                            <br>
                            <label for="university_id">Университет</label>
                            <select class="form-control m-bot15" name="university_id" id="university_id">

                                @foreach(\App\Models\University::all() as $university)
                                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                                @endforeach

                            </select>
                            <button type="button" name="buttonShowUni" id="buttonShowUni">Редакция на списък</button>
                            <br>
                            <br>
                            <div id="add-uni-form" class="hidden">
                                <label for="uni">Университет</label>
                                <input type="text" id="uni" name="name" />
                                <br>
                                <br>
                                <label for="score">Оценка</label>
                                <input type="text" id="score" name="score" />
                                <br>
                                <br>
                                <button type="button" name="buttonUni" id="buttonUni">Запис на университет</button>
                            </div>
                            <label for="skills">Избери умения:</label>
                            <select name="skills[]" id="skills" multiple>
                                @foreach(\App\Models\Skill::all() as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                            <button type="button" name="buttonShowSkill" id="buttonShowSkill">Редакция на списък</button>
                            <br>
                            <div id="add-skill-form" class="hidden">
                                <label for="skill">Умение</label>
                                <input type="text" id="skill" name="skill" />
                                <br>
                                <br>
                                <button type="button" name="buttonSkill" id="buttonSkill">Запис на умение</button>
                            </div>
                            <br>
                        </form>
                        <button type="button" name="buttonSave" id="buttonSave">Запис на CV</button>
                        <button type="button" name="buttonFind" id="buttonFind">Справки</button>
                        <br>
                        <br>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#buttonSave").click(function(){
            const formData = $( 'form' ).serializeArray();
            $.post("/cv", formData);
        });
        $("#buttonUni").click(function(){
            const formData = $( 'form' ).serializeArray();
            $.post("/university",
                {_token:formData[0]['value'], name:formData[6]['value'], score:formData[7]['value']}).done(
                function(response){
                        const node = document.createElement("option");
                        node.setAttribute('value', response.data.id)
                        const text = document.createTextNode(response.data.name);
                        node.appendChild(text);
                        document.getElementById("university_id").appendChild(node);
                        $("#add-uni-form").toggle();
                    });
        });
        $("#buttonShowUni").click(function(){
            $("#add-uni-form").toggle();
        });
        $("#buttonSkill").click(function(){
            const formData = $( 'form' ).serializeArray();
            $.post("/skill",
                {_token:formData[0]['value'], name:formData[8]['value']}).done(
                function(response){
                    const node = document.createElement("option");
                    node.setAttribute('value', response.data.id)
                    const text = document.createTextNode(response.data.name);
                    node.appendChild(text);
                    document.getElementById("skills").appendChild(node);
                    $("#add-skill-form").toggle();
                });
        });
        $("#buttonShowSkill").click(function(){
            $("#add-skill-form").toggle();
        });
        $("#buttonFind").click(function(){
            window.location.replace("/find");
        });
    });
</script>
