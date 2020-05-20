<php
    <table>
        <thead
            <tr>
                <th>Id</th>
                <th>email</th>
                <th>username</th>
                <th>jelszó</th>
                <th>Admin</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
               <?php foreach($u as &$u): ?>
                    <td><br><?=$u->id?></td>
                    <td><?=$u->email?></td>    
                    <td><?=$u->username?></td> 
                    <td><?=$u->password?></td>   
                    <td><?=$u->admin?></td> 
                <?php endforeach; ?>
            </tr>           
        </tbody>
 </table>

