const contract = require('truffle-contract');
const course_artifact = require('../build/contracts/Course.json');
var course = contract(course_artifact);
//artifact包含了很多Info(abi etc)的 json文件，在truffle compile后會在built foleder產生

module.exports = {
    start: function(callback) {
        var self = this;

        // Bootstrap the MetaCoin abstraction for Use.
        course.setProvider(self.web3.currentProvider);

        // Get the initial account balance so it can be displayed.
        //確認有沒有provider，避免重複設置
        self.web3.eth.getAccounts(function(err, accs) {
            if (err != null) {
                console.log("There was an error fetching your accounts.");
                return;
            }
            //檢查賬號有無存在
            if (accs.length == 0) {
                console.log("Couldn't get any accounts! Make sure your Ethereum client is configured correctly.");
                return;
            }
            self.accounts = accs;
            self.account = self.accounts[2];

            callback(self.accounts);
        });
    },

    refreshBalance: function(account, callback) {
        var self = this;

        // Bootstrap the MetaCoin abstraction for Use.
        course.setProvider(self.web3.currentProvider);

        var meta;
        course.deployed().then(function(instance) {
            meta = instance;
            return meta.getBalance.call(account, {from: account});
        }).then(function(value) {
            callback(value.valueOf());
        }).catch(function(e) {
            console.log(e);
            callback("Error 404");
        });
    },
    NewProduct: function(amount, sender, receiver, callback) {
        var self = this;

        // Bootstrap the MetaCoin abstraction for Use.
        course.setProvider(self.web3.currentProvider);

        var meta;
        course.deployed().then(function(instance) {
            meta = instance;
            return meta.sendCoin(receiver, amount, {from: sender});
        }).then(function() {
            self.refreshBalance(sender, function (answer) {
                callback(answer);
            });
        }).catch(function(e) {
            console.log(e);
            callback("ERROR 404");
        });
    }
}