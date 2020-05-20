<php
    <table>
        <thead
            <tr>
                <th>Kérdés Id</th>
                <th>Kérdés</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
               <?php foreach($q as &$q): ?>
                    <td><br><?=$q->id?></td>
                    <td><?=$q->question?></td>    
                <?php endforeach; ?>
            </tr>           
        </tbody>
 </table>
