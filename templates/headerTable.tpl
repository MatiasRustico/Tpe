<table id="tabla">
                <thead>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Precio
                    </th>
                    <th>
                        Categoria
                    </th>
                    <th>
                        Descripcion
                    </th>
                    <th>
                        Valoracion
                    </th>
                    {if isset($smarty.session.PERMIT)}
                        <th>
                            Editar
                        </th>
                        
                        <th>
                            Borrar
                        </th>
                        

                    {/if}
                    
                </thead>
                <tbody id="ingresardatos">