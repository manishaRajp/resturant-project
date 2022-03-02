

@extends('admin.layouts.master')
<!DOCTYPE html>

<body>
    <div class="content-wrapper">
        <div class="container-fluid">
            <h1>Wellcome,Admin</h1>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 style="font-size:200%;" class="card-title">Select Restaurant</h4>
                                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                    <select class="selectpicker myClass select2 form-control " placeholder="Country">
                                        <option class="opt" value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(function() {
            var $select = $('.select2');
            $select.select2({
                theme: 'paper'
            });
        });
    </script>
</body>

</html>