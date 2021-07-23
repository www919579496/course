var express = require('express');
var app = express();
var Web3=require('web3');

//app.use(express.static(__dirname));

app.get('/apiget', (req, res) => {
    const data = JSON.parse(req.query.data);
    console.log(req.query.data)
    //console.log(data.name, data.user_id, data.ractopamine);
    if (typeof web3 !== 'undefined') {
        web3 = new Web3(web3.currentProvider);
    } else {
    // set the provider you want from Web3.providers
        web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:7545"));
    }
    console.log (web3.currentProvider) 
    // contractAddress and abi are setted after contract deploy
    var contractAddress = '0x7117B7F8ab1F08b06AeB1Bb279b119f4EAba75a4';
    var abi = JSON.parse('[{"constant": false, "inputs": [ { "name": "_id", "type": "uint256" }, { "name": "_name", "type": "string" }, { "name": "_weight", "type": "string" }, { "name": "_detail", "type": "string" }, { "name": "_ractopamine", "type": "bool" } ], "name": "newProduct", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "anonymous": false, "inputs": [ { "indexed": false, "name": "", "type": "uint256" }, { "indexed": false, "name": "", "type": "address" } ], "name": "LogNewProduct", "type": "event" }, { "constant": true, "inputs": [ { "name": "_index", "type": "uint256" } ], "name": "getProduct", "outputs": [ { "name": "", "type": "uint256" }, { "name": "", "type": "string" }, { "name": "", "type": "string" }, { "name": "", "type": "string" }, { "name": "", "type": "bool" } ], "payable": false, "stateMutability": "view", "type": "function"}]');
      
    //contract instance
    contract = new web3.eth.Contract(abi, contractAddress);
    // Accounts
    var account;
      
    web3.eth.getAccounts(function(err, accounts) {
        if (err != null) {
            console.log("Error retrieving accounts.");
          return;
        }
        if (accounts.length == 0) {
            console.log("No account found! Make sure the Ethereum client is configured properly.");
          return;
        }
        account = accounts[0];
        console.log('Account: ' + account);
       
        web3.eth.defaultAccount = account;
    });
      
    //Smart contract functions
    contract.methods.newProduct (data.user_id,data.name,data.weight,data.detail,data.ractopamine).send( {from: account}).then( function(receipt) { 
        console.log("Transaction: ", receipt); 
        console.log(JSON.stringify(receipt));       
        });
    
    
    res.send("success");
  })

app.listen('3300');
console.log('Running at\nhttp://localhost:3300');