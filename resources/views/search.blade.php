<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CV-Search</title>

    <!-- Styles -->
    <style>
        main{
            border-style: solid;
            margin: 100px 300px;
            padding: 10px 10px;
            display: flex;
            flex-direction: column;
        }
        header{
            text-align: center;
            margin-top: 50px;
            font-size: 40px;
        }
        th{
            text-align: start;
        }
    </style>
</head>
<body>
<div>
    <div>
        <div>
            <header>
                Търсене на CV
            </header>

            <main>
                <form>
                    @csrf

                    <label for="start_date">Начална дата</label>
                    <input type="date" id="start_date" name="start_date" />
                    <br>
                    <br>
                    <label for="end_date">Крайна дата</label>
                    <input type="date" id="end_date" name="end_date" />
                    <br>
                    <br>
                    <button type="button" name="buttonCV" id="buttonCV">Добави ново CV</button>
                    <button type="button" name="buttonSearch" id="buttonSearch">Търси</button>
                    <br>
                    <br>
                </form>
                <table id="table">
                    <tr>
                        <th>Имена</th>
                        <th>Дата на раждане</th>
                        <th>Университет</th>
                        <th>Умения</th>
                    </tr>
                </table>
            </main>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#buttonSearch").click(function () {
            const formData = $('form').serializeArray();
            $.post("/search", formData).done(
                function(response){
                    $("#table td").remove();
                    response.forEach((data) => {
                        const tr = document.createElement("tr");
                        tr.setAttribute('id', data.id)
                        document.getElementById("table").appendChild(tr);

                        let td = document.createElement("td");
                        const f_name = document.createTextNode(data.person.first_name + ' ');
                        const s_name = document.createTextNode(data.person.second_name + ' ');
                        const t_name = document.createTextNode(data.person.third_name);
                        td.appendChild(f_name);
                        td.appendChild(s_name);
                        td.appendChild(t_name);
                        document.getElementById(data.id).appendChild(td);

                        td = document.createElement("td");
                        const b_date = document.createTextNode(data.person.birth_date);
                        td.appendChild(b_date);
                        document.getElementById(data.id).appendChild(td);

                        td = document.createElement("td");
                        const university = document.createTextNode(data.university.name);
                        td.appendChild(university);
                        document.getElementById(data.id).appendChild(td);

                        td = document.createElement("td");
                        data.skills.forEach((skill) => {
                            const newSkill = document.createTextNode(skill.name + ' ');
                            td.appendChild(newSkill);
                        })
                        document.getElementById(data.id).appendChild(td);
                    });

                });
        });
        $("#buttonCV").click(function(){
            window.location.replace("/");
        });
    });
</script>
