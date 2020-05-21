<php
    <table>
        <thead
            <tr>
                <th>Id</th>
                <th>Kérdés_id</th>
                <th>Kérdés</th>
                
            </tr>
        </thead>
        
        <tbody>
            <tr>
               <?php foreach($q1 as &$q1): ?>
                    <td><br><?=$q1->id?></td>
                    <td><?=$q1->question_id?></td> 
               <?php endforeach; ?>
                    <td> 
                        
                        <?php foreach ($YNQ as &$qYN) : ?>    
                             <?=$qYN?>
                         <?php endforeach; ?>
                     </td> 
            </tr>
            
            
            <tr>
                    
                <?php foreach($q2 as &$q2): ?>
                    <td><br><?=$q2->id?></td>
                    <td><?=$q2->question_id?></td> 
                <?php endforeach; ?>
                    
                        <?php foreach ($ThreeAns as &$qThreeAns) : ?>    
                    <td> <?=$qThreeAns?></td>
                         <?php endforeach; ?>
                    
                    
            </tr>           
        </tbody>
 </table>


