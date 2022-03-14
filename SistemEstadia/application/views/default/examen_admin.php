<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Examenes</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <h4>Exámenes</h4>
        <button>Agregar examen</button>
        <button>Modificar examen</button>
        <button>Eliminar examen</button>
        <div class="wrap">
        
            <table border="1">
                <tbody>
                    <tr>
                        <th>Nombre del examen</th>
                        <th>Preguntas</th>
                    </tr>
                    <td><input placeholder="Inserta el nombre del examen" size="30"></td>
                    
                    <td><p style="margin:-0.0% 0;">Tu pregunta:</p><textarea id ="txt" name="txt[]" placeholder="Inserta tu pregunta"></textarea>
                    <p>
                    
                        <div>
                            <input type="radio" name="opcion" id="opcion"><input placeholder="Inserte su opción"></input>
                        </div>
                        <div>
                            <input type="radio" name="opcion" id="opcion"><input placeholder="Inserte su opción"></input>
                        </div>
                        <div>
                            <input type="radio" name="opcion" id="opcion"><input placeholder="Inserte su opción"></input>
                        </div>
                        <div>
                            <input type="radio" name="opcion" id="opcion"><input placeholder="Inserte su opción"></input>
                        </div>
                    </p>
                    <button id="add">+</button></td>
                    
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $("#add").click(function(){
                   // var contador = $("textarea[id='txt']").length;

                    $(this).before('<div><p><td><p style="margin:-0.0% 0;">Tu pregunta:</p><textarea placeholder="Inserta tu pregunta" id="txt""name="txt[]"></textarea>'+
                    '<div><td><input type="radio" name="opcion" id="opcion"><input placeholder="Inserte su opción"></input></td></div>'+
                    '<div><td><input type="radio" name="opcion" id="opcion"><input placeholder="Inserte su opción"></input></td></div>'+
                    '<div><td><input type="radio" name="opcion" id="opcion"><input placeholder="Inserte su opción"></input></td></div>'+
                    '<div><td><input type="radio" name="opcion" id="opcion"><input placeholder="Inserte su opción"></input></td></div><button class="delete">Eliminar</button></td></div></p>');
                    });

                    $(document).on('click', '.delete', function(){
                    $(this).parent().remove();
                    });
                });
            </script>
            <button>Guardar examen</button>
        </div>   
    </body>
</html>