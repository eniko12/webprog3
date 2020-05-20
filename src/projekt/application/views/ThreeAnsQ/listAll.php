<php
    <table>
        <thead
            <tr>
                <th>Id</th>
                <th>Kérdés Id</th>
                <th>Válasz_Id</th>
                <th>Típus</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
               <?php foreach($threeans as &$threeans): ?>
                    <td><br><?=$threeans->id?></td>
                    <td><?=$threeans->question_id?></td>    
                    <td><?=$threeans->ans_id?></td> 
                    <td><?=$threeans->type_id?></td>     
                <?php endforeach; ?>
            </tr>           
        </tbody>
 </table>
