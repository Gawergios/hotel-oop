


// let req = new XMLHttpRequest();
// req.open("GET", "https://f704cb9e-bf27-440c-a927-4c8e57e3bad1.mock.pstmn.io/s1/availability")
// req.send();
// console.log(req)
// req.onreadystatechange = function () {
//     if (this.readyState === 4 && this.status === 200) {
//     let jsData = JSON.parse(req.responseText).hotels
//         for (let i = 0; i < jsData.length; i++) {
//             let con = document.getElementById("apiaa")
//             let div = document.createElement("div")
//             let h1 = document.createElement("h1")
//             let h3 = document.createElement("h3")
//             let name = document.createTextNode( jsData[i].name)
//             let stars = document.createTextNode(`stars : ${jsData[i].stars}`)
//             h1.appendChild(name)
//             h3.appendChild(stars)
//             div.appendChild(h1)
//             div.appendChild(h3)
//             for (let j = 0; j < jsData[i].rooms.length; j++) {
//                 let h4 = document.createElement("h4")
//                 let code = document.createTextNode(`   code : ${jsData[i].rooms[j].code}`)
//                 let net = document.createTextNode(`   net_price : ${jsData[i].rooms[j].net_price}    &`)
//                 let taxes = document.createTextNode(`    taxes{   amount : ${jsData[i].rooms[j].taxes.amount}`)
//                 let type = document.createTextNode(` &  type : ${jsData[i].rooms[j].taxes.type}   }   &`)
//                 let total = document.createTextNode(`   total : ${jsData[i].rooms[j].total+ " " + jsData[i].rooms[j].taxes.currency}`)
//                 h4.appendChild(code)
//                 div.appendChild(h4)
//                 div.appendChild(net)
//                 div.appendChild(taxes)
//                 div.appendChild(type)
//                 div.appendChild(total)
//                 con.appendChild(div)
//             }
//             document.body.appendChild(con)
//         }
// }
// }

/* <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item sweets" data-item="sweets">
                        <div class="card ">
                            
                            <div class="card-body">
                                <div class="card-text d-flex justify-content-between text-capitalize">
                                    <h5 id="store-item-name"><?= $data['code']; ?></h5>
                                    <h5 class="store-item-value"><?= $data['total'] ?><strong id="store-item-price" class="font-weight-bold"><?= $data['currency'] ?></strong></h5>
                                </div>
                            </div>
                        </div>
                        <!-- end of card-->
                    </div> */