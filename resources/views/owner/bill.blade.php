<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }
        .bg-grey {
            background: #F3F3F3;
        }
        .text-right {
            text-align: right;
        }
        .w-full {
            width: 100%;
        }
        .small-width {
            width: 15%;
        }
        .invoice {
            background: white;
            border: 1px solid #CCC;
            font-size: 14px;
            padding: 48px;
            margin: 20px 0;
        }
    </style>
</head>
<body class="bg-grey">

  <div class="container container-smaller">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1" style="margin-top:20px; text-align: right">
        <div class="btn-group mb-4">
          <a href="" class="btn btn-success">Print</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
          <div class="invoice">

            <div class="row">

              <div class="col-sm-7">
                <h4>Date:</h4>
                <address>
                <strong>{{ $date }}</strong>
                </address>
              </div>


            </div>

            <div class="table-responsive">
              <table class="table invoice-table">
                <thead style="background: #F5F5F5;">
                  <tr>
                    <th>Item List</th>
                    <th>Quantity</th>
                    <th class="text-right">Price</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>
                          <p>{{ $data->menu->name }}</p>
                        </td>
                        <td>{{ $data->quantity }}</td>
                        <td class="text-right">{{$data->quantity*$data->menu->price}}</td>
                      </tr>
                    @endforeach



                  </tbody>
                </table>
              </div><!-- /table-responsive -->

              <table class="table invoice-total">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>Total :</strong></td>
                    <td class="text-right small-width">{{ $total }}</td>
                  </tr>
                </tbody>
              </table>

              <table class="table invoice-total">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>Vat(15%) :</strong></td>
                    <td class="text-right small-width">{{ $vat }}</td>
                  </tr>
                </tbody>
              </table>

              <table class="table invoice-total">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>Sub Total :</strong></td>
                    <td class="text-right small-width">{{ $sub_total }}</td>
                  </tr>
                </tbody>
              </table>

              <hr>

            </div>
        </div>
      </div>
    </div>

  </body>
</html>
