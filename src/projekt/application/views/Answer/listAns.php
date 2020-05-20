<php
    <table>
        <thead
            <tr>
                <th>Id</th>
                <th>a) válasz</th>
                <th>b) válasz</th>
                <th>c) válasz</th>
                <th>Helyes válasz</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
               <?php foreach($a as &$a): ?>
                    <td><br><?=$a->id?></td>
                    <td><?=$a->a?></td>    
                    <td><?=$a->b?></td> 
                    <td><?=$a->c?></td>    
                    <td><?=$a->correct?></td>     
                <?php endforeach; ?>
            </tr>           
        </tbody>
 </table>

