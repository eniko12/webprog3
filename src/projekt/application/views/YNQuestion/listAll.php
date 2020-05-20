<php
    <table>
        <thead
            <tr>
                <th>Id</th>
                <th>Kérdés Id</th>
                <th>Válasz</th>
                <th>Típus</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
               <?php foreach($yn as &$yn): ?>
                    <td><br><?=$yn->id?></td>
                    <td><?=$yn->question_id?></td>    
                    <td><?=$yn->answer?></td> 
                    <td><?=$yn->type_id?></td>     
                <?php endforeach; ?>
            </tr>           
        </tbody>
 </table>