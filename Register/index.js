// Source code to interact with smart contract

// web3 provider with fallback for old version
if (window.ethereum) {
    window.web3 = new Web3(window.ethereum)
    try {
        // ask user for permission
        ethereum.enable()
        // user approved permission
    } catch (error) {
        // user rejected permission
        console.log('user rejected permission')
    }
  }
  else if (window.web3) {
    window.web3 = new Web3(window.web3.currentProvider)
    // no need to ask for permission
  }
  else {
    window.alert('Non-Ethereum browser detected. You should consider trying MetaMask!')
  }
  console.log (window.web3.currentProvider)
  
  // contractAddress and abi are setted after contract deploy
  var contractAddress = '0x66C92C503b542245e655468283Be848B6E46DF12';
  var abi = JSON.parse('[{"constant": false, "inputs": [ { "name": "_id", "type": "uint256" }, { "name": "_name", "type": "string" }, { "name": "_weight", "type": "string" }, { "name": "_detail", "type": "string" }, { "name": "_ractopamine", "type": "bool" } ], "name": "newProduct", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "anonymous": false, "inputs": [ { "indexed": false, "name": "", "type": "uint256" }, { "indexed": false, "name": "", "type": "address" } ], "name": "LogNewProduct", "type": "event" }, { "constant": true, "inputs": [ { "name": "_index", "type": "uint256" } ], "name": "getProduct", "outputs": [ { "name": "", "type": "uint256" }, { "name": "", "type": "string" }, { "name": "", "type": "string" }, { "name": "", "type": "string" }, { "name": "", "type": "bool" } ], "payable": false, "stateMutability": "view", "type": "function"}]');
  
  //contract instance
  contract = new web3.eth.Contract(abi, contractAddress);
  
  // Accounts
  var account;
  
  web3.eth.getAccounts(function(err, accounts) {
    if (err != null) {
      alert("Error retrieving accounts.");
      return;
    }
    if (accounts.length == 0) {
      alert("No account found! Make sure the Ethereum client is configured properly.");
      return;
    }
    account = accounts[0];
    console.log('Account: ' + account);
   
    web3.eth.defaultAccount = account;
  });
  
  //Smart contract functions
  function newProduct() {
    _id = $("#user_id").val();
    _name= $("#name").val();
    _weight=$("#weight").val();
    _detail=$("#detail").val();
    _ractopamine=$("#ractopamine").val();
    contract.methods.newProduct (_id,_name,_weight,_detail,_ractopamine).send( {from: account}).then( function(receipt) { 
      console.log("Transaction: ", receipt); 
      alert(JSON.stringify(receipt));
     
    });
    
    $("#user_id").val('');
    $("#name").val('');
    $("#weight").val('');
    $("#detail").val('');
    $("#ractopamine").val('');
  }
  
  function getProduct() {
    // const { exec } = require('child_process');
    _index=$("#index").val();
    contract.methods.getProduct(_index).call().then(function (data) {
      console.log(data);
      //alert(JSON.stringify(data));
      document.getElementById('_user_id').innerHTML = data['0'];
      document.getElementById('_name').innerHTML = data['1'];
      document.getElementById('_weight').innerHTML = data['2']; 
      document.getElementById('_detail').innerHTML = data['3']; 
      document.getElementById('_ractopamine').innerHTML = data['4']; 
    });
    //(data) => {value = data}
    
    $("#index").val('');

  }