<?php
/**
 * Purchase Requisition Form Template.
 *
 * @since  1.0.0
 */
?>

<style>
    .content {
        overflow: auto;
        width: 100%;
    }

    .content .table1 {
        border: 1px solid #dededf;
        min-width: 50%;
        table-layout: fixed;
        border-collapse: collapse;
        border-spacing: 1px;
        text-align: left;
    }

    .content .table2 {
        border: 1px solid #dededf;
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
        border-spacing: 1px;
        text-align: left;
    }

    .content th {
        border: 1px solid #dededf;
        background-color: #eceff1;
        color: #000000;
        padding: 5px;
    }

    .content td {
        border: 1px solid #dededf;
        padding: 5px;
    }

    .content .even {
        background-color: #ffffff;
        color: #000000;
    }

    .content .odd {
        background-color: #eaf2fa;
        color: #000000;
    }

    .approved {
        color: #5cb85c;
        border-color: #4cae4c;
    }

    .rejected {
        color: #d9534f;
        border-color: #d43f3a;
    }
</style>

<div class="content" role="region" tabindex="0">
    <table class="table1">
        <thead>
            <tr>
                <th>Info</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <table class="table1">
        <thead></thead>
        <tbody>
            <tr class="odd">
                <td><strong>Date</strong></td>
                <td>{Date:6}</td>
            </tr>
            <tr class="even">
                <td><strong>Type</strong></td>
                <td>{Type:5}</td>
            </tr>
            <tr class="odd">
                <td><strong>Site</strong></td>
                <td>{Site:89}</td>
            </tr>
            <tr class="even">
                <td><strong>Department/cost centre</strong></td>
                <td>{Department/cost centre:8}</td>
            </tr>
            <tr class="odd">
                <td><strong>Requisitioned by</strong></td>
                <td>{Requisitioned by:56}</td>
            </tr>
            <tr class="even">
                <td><strong>Tel. ext. #</strong></td>
                <td>{Tel. ext. #:92}</td>
            </tr>
            <tr class="odd">
                <td><strong>Suggested supplier</strong></td>
                <td>{Suggested supplier:12}</td>
            </tr>
            <tr class="even">
                <td><strong>Comments</strong></td>
                <td>{Comments:93}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="table2">
        <thead>
            <tr>
                <th>Items</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <table class="table2">
        <thead>
            <tr>
                <th>#</th>
                <th>Quantity</th>
                <th>Unit of measure</th>
                <th>Vendor's catalogue NO.</th>
                <th>Description</th>
                <th>Unit price</th>
                <th>Total amount</th>
                <th>EOC</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd">
                <td>1</td>
                <td>{item1Qty:34}</td>
                <td>{item1UnitMeasure:35}</td>
                <td>{item1VendorsCatalogueNo:36}</td>
                <td>{item1Description:71}</td>
                <td>{item1UnitPrice:72}</td>
                <td>{item1TotalAmount:37}</td>
                <td>{item1Eoc:73}</td>
            </tr>
<?php
    foreach( $number_fields as $field ) {
        
        $value = rgar( $entry, $field->id );
        
        if ( $field->id == 42 && $value > 0 ) { ?>
            <tr class="even">
                <td>2</td>
                <td>{item2Qty:39}</td>
                <td>{item2UnitMeasure:40}</td>
                <td>{item2VendorsCatalogueNo:74}</td>
                <td>{item2Description:41}</td>
                <td>{item2UnitPrice:75}</td>
                <td>{item2TotalAmount:42}</td>
                <td>{item2Eoc:76}</td>
            </tr>
        <?php }

        if ( $field->id == 46 && $value > 0 ) { ?>
            <tr class="odd">
                <td>3</td>
                <td>{item3Qty:43}</td>
                <td>{item3UnitMeasure:44}</td>
                <td>{item3VendorsCatalogueNo:78}</td>
                <td>{item3Description:45}</td>
                <td>{item3UnitPrice:81}</td>
                <td>{item3TotalAmount:46}</td>
                <td>{item3Eoc:82}</td>
            </tr>
        <?php }

        if ( $field->id == 50 && $value > 0 ) { ?>
            <tr class="even">
                <td>4</td>
                <td>{item4Qty:47}</td>
                <td>{item4UnitMeasure:48}</td>
                <td>{item4VendorsCatalogueNo:79}</td>
                <td>{item4Description:49}</td>
                <td>{item4UnitPrice:85}</td>
                <td>{item4TotalAmount:50}</td>
                <td>{item4Eoc:83}</td>
            </tr>
        <?php }

        if ( $field->id == 54 && $value > 0 ) { ?>
            <tr class="odd">
                <td>5</td>
                <td>{item5Qty:51}</td>
                <td>{item5UnitMeasure:52}</td>
                <td>{item5VendorsCatalogueNo:80}</td>
                <td>{item5Description:53}</td>
                <td>{item5UnitPrice:86}</td>
                <td>{item5TotalAmount:54}</td>
                <td>{item5Eoc:84}</td>
            </tr>
        <?php }

        if ( $field->id == 110 && $value > 0 ) { ?>
            <tr class="even">
                <td>6</td>
                <td>{item6Qty:105}</td>
                <td>{item6UnitMeasure:106}</td>
                <td>{item6VendorsCatalogueNo:107}</td>
                <td>{item6Description:108}</td>
                <td>{item6UnitPrice:109}</td>
                <td>{item6TotalAmount:110}</td>
                <td>{item6Eoc:111}</td>
            </tr>
        <?php }

        if ( $field->id == 119 && $value > 0 ) { ?>
            <tr class="odd">
                <td>7</td>
                <td>{item7Qty:114}</td>
                <td>{item7UnitMeasure:115}</td>
                <td>{item7VendorsCatalogueNo:116}</td>
                <td>{item7Description:117}</td>
                <td>{item7UnitPrice:118}</td>
                <td>{item7TotalAmount:119}</td>
                <td>{item7Eoc:120}</td>
            </tr>
        <?php }

        if ( $field->id == 130 && $value > 0 ) { ?>
            <tr class="even">
                <td>8</td>
                <td>{item8Qty:125}</td>
                <td>{item8UnitMeasure:126}</td>
                <td>{item8VendorsCatalogueNo:127}</td>
                <td>{item8Description:128}</td>
                <td>{item8UnitPrice:129}</td>
                <td>{item8TotalAmount:130}</td>
                <td>{item8Eoc:131}</td>
            </tr>
        <?php }

        if ( $field->id == 139 && $value > 0 ) { ?>
            <tr class="odd">
                <td>9</td>
                <td>{item9Qty:134}</td>
                <td>{item9UnitMeasure:135}</td>
                <td>{item9VendorsCatalogueNo:136}</td>
                <td>{item9Description:137}</td>
                <td>{item9UnitPrice:138}</td>
                <td>{item9TotalAmount:139}</td>
                <td>{item9Eoc:140}</td>
            </tr>
        <?php }

        if ( $field->id == 148 && $value > 0 ) { ?>
            <tr class="even">
                <td>10</td>
                <td>{item10Qty:143}</td>
                <td>{item10UnitMeasure:144}</td>
                <td>{item10VendorsCatalogueNo:145}</td>
                <td>{item10Description:146}</td>
                <td>{item10UnitPrice:147}</td>
                <td>{item10TotalAmount:148}</td>
                <td>{item10Eoc:149}</td>
            </tr>
        <?php }

        if ( $field->id == 157 && $value > 0 ) { ?>
            <tr class="odd">
                <td>11</td>
                <td>{item11Qty:152}</td>
                <td>{item11UnitMeasure:153}</td>
                <td>{item11VendorsCatalogueNo:154}</td>
                <td>{item11Description:155}</td>
                <td>{item11UnitPrice:156}</td>
                <td>{item11TotalAmount:157}</td>
                <td>{item11Eoc:158}</td>
            </tr>
        <?php }

        if ( $field->id == 166 && $value > 0 ) { ?>
            <tr class="even">
                <td>12</td>
                <td>{item12Qty:161}</td>
                <td>{item12UnitMeasure:162}</td>
                <td>{item12VendorsCatalogueNo:163}</td>
                <td>{item12Description:164}</td>
                <td>{item12UnitPrice:165}</td>
                <td>{item12TotalAmount:166}</td>
                <td>{item12Eoc:167}</td>
            </tr>
        <?php }

        if ( $field->id == 175 && $value > 0 ) { ?>
            <tr class="odd">
                <td>13</td>
                <td>{item13Qty:170}</td>
                <td>{item13UnitMeasure:171}</td>
                <td>{item13VendorsCatalogueNo:172}</td>
                <td>{item13Description:173}</td>
                <td>{item13UnitPrice:174}</td>
                <td>{item13TotalAmount:175}</td>
                <td>{item13Eoc:176}</td>
            </tr>
        <?php }

        if ( $field->id == 184 && $value > 0 ) { ?>
            <tr class="even">
                <td>14</td>
                <td>{item14Qty:179}</td>
                <td>{item14UnitMeasure:180}</td>
                <td>{item14VendorsCatalogueNo:181}</td>
                <td>{item14Description:182}</td>
                <td>{item14UnitPrice:183}</td>
                <td>{item14TotalAmount:184}</td>
                <td>{item14Eoc:185}</td>
            </tr>
        <?php }

        if ( $field->id == 193 && $value > 0 ) { ?>
            <tr class="odd">
                <td>15</td>
                <td>{item15Qty:188}</td>
                <td>{item15UnitMeasure:189}</td>
                <td>{item15VendorsCatalogueNo:190}</td>
                <td>{item15Description:191}</td>
                <td>{item15UnitPrice:192}</td>
                <td>{item15TotalAmount:193}</td>
                <td>{item15Eoc:194}</td>
            </tr>
        <?php }
    }
?>
        </tbody>
    </table>
    <br>
    <table class="table1">
        <thead>
            <tr>
                <th>Approvers</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <table class="table1">
        <thead>
            <tr>
                <th>Role</th>
                <th>Assignee</th>
                <th>Approved?</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd">
                <td>Responsible VP</td>
                <td>{Assign to Responsible VP:58}</td>
                <td class="approved">✔</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="even">
                <td>VP Performance/CFE</td>
                <td>{Assign to VP Performance/CFE:59}</td>
                <td class="approved">✔</td>
                <td>&nbsp;</td>
            </tr>
            <tr class="odd">
                <td>President/CEO</td>
                <td>{Assign to President/CEO:63}</td>
                <td class="approved">✔</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>
