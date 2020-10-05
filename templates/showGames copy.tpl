//incluimos el header
        include_once 'templates/header.php';

        echo ('
            <article class="tablausuarios">
            <section>
        '); 

       

        echo ('<div class="categorieItem">');
        foreach ($categories as $categorie){
            echo ('<a href="categories/' . $categorie->nombre .'" class="filtro"> '. $categorie->nombre .'</a>');
        }
        echo ('</div>');
       
        include_once 'templates/headerTable.php';
                    
        foreach ($games as $game){
            if ($game->valoracion == 5 ){
                echo ('<tr class="logroHoras">');
            }else{
                echo ('<tr>');
            }

            // nombre
            echo ('<td>');
            echo ($game->nombre);
            echo ('</td>');

            // precio
            echo ('<td>');
            echo ($game->precio . ' $');
            echo ('</td>');

            // categoria id
            echo ('<td>');
            //echo ($game->id_categoria);
            
        

            foreach ($categories as $categorie){
                if ($categorie->id == $game->id_categoria){

                    //echo ($categorie->nombre);

                    echo ('<a href="categories/' . $categorie->nombre .'" class="filtro"> '. $categorie->nombre .'</a>');
                    
                }
            }
 
            echo ('</td>');

            // descripcion
            echo ('<td>');
            echo ($game->descripcion) ;
            echo ('</td>');

            // valoracion
            echo ('<td>');

            //echo ($game->valoracion . "⭐");

            if  ($game->valoracion == 1){
                echo ("⭐");
            }else if ($game->valoracion == 2){
                echo ("⭐⭐");
            }else if ($game->valoracion == 3){
                echo ("⭐⭐⭐");
            }else if ($game->valoracion == 4){
                echo ("⭐⭐⭐⭐");
            }else if ($game->valoracion == 5){
                echo ("⭐⭐⭐⭐⭐");
            }

            echo ('</td>');

            echo ('<td>');
            echo ('<a href="delete/'.  $game->id . ' ">🗑️</a>');
            echo ('</td>');


            echo ('</tr>');
        }

        echo(' </tbody>
            </table>
            </section>');
        
        echo('<section>');
        
        include_once "templates/form.up.php";
        echo('<select name="categoria" class="form-control">');
        
    
        foreach ($categories as $categorie){
            echo ('<option value=" '. $categorie->id .' "> '. $categorie->nombre .' </option>');   
        }
        

        echo('</select>');
        include_once "templates/form.down.php";

        
        //incuimos el footer
        include_once 'templates/footer.php';