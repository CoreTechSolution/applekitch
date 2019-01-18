

<htnl>
<thead>
<tr>
    <th>
    name
    </th>
</tr>
</thead>
    <tbody>
    <?php
    $i=0;
    foreach($data as $p){
        $i++;
    ?>
        <tr>
            <td><?php echo $p['name'];?></td>
        </tr>
    <?php } ?>
    </tbody>

</htnl>