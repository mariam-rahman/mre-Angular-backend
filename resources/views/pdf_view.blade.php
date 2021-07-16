<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Total products</th>
                                        <th>Remaining products</th>
                                        <th>Category</th>
                                        <th>Transfer Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($substocks as $substock)
                                    <tr>
                                        <td>{{$substock->product->name}}</td>
                                        <td>{{$substock->qty}}</td>
                                        <td>{{$substock->remaining_qty}}</td>
                                        <td>{{$substock->product->category->title}}</td>
                                        <td>{{$substock->created_at}}</td>
                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
</body>
</html>