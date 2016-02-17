<!-- begin Card1Dash2.tpl -->

<div class="row">
    <div class="col12 m6">
        <div class="card z-depth-1-half" id="card1">
            <div class="card-content hoverable">
                <span class="card-title">Browser Statistics</span>
                <table id="card1a" class="striped">
                    <tr>
                        <th>Browser ID</th>
                        <th>Browser Name</th>
                        <th>Number of Hits</th>
                        <th>% of total</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- end Card1Dash2.tpl -->
<script>
    $(document).ready(function(){
        var updateCard1 = function() {
            //base url
            var uri = '<?= $siteurl ?>?url=api/card1Dash2';
            // ajax
            $.get(uri)
                    .done(function (data) {
                        console.log(data);
                        // data is an array of object
                        data.forEach(function (item, index) {
                            var newRow = document.createElement('tr');
                            var newCol1 = document.createElement('td');
                                newCol1.innerText = item.id;
                            var newCol2 = document.createElement('td');
                                newCol2.innerText = item.name;
                            var newCol3 = document.createElement('td');
                                newCol3.innerText = item.hits;
                            var newCol4 = document.createElement('td');
                                newCol4.innerText = item.percentage;
                            $(newCol1).appendTo(newRow);
                            $(newCol2).appendTo(newRow);
                            $(newCol3).appendTo(newRow);
                            $(newCol4).appendTo(newRow);
                            $(newRow).appendTo('#card1a');
                            console.log(newRow);
                        });
                    })
                    .fail(function () {

                    })
                    .always(function () {

                    });
        }
        updateCard1();
    });
</script>