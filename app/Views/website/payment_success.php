
     <style>
   /*   body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }*/
        h1 {
          color: #2EFF2E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      .checkmark {
        color: #2EFF2E;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        text-align: center;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 44px auto;
      }
    </style>
 <section style="text-align: center;">
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>Thank You. <br/> Your Transaction Success!</p><br>
       
        
                  <table class="table table-bordered m-top20">
                     <tbody>
                        <tr>
                           <th>Donation ID.</th>
                           <td><?php echo $txnid;?></td>
                        </tr>
                        <tr>
                           <th>Reference ID</th>
                           <td><?php echo $bank_ref_num;?></td>
                        </tr>
                          <tr>
                           <th>Payment Amount</th>
                           <td><?php echo $donation_amount;?></td>
                        </tr>
                         
                        
                       
                          
                     </tbody>
                  </table>
      </div>
    </section>
