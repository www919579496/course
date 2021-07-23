// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.4.25 <0.6.0;

contract Course {
    
    struct Product{
        uint user_id;
        string name;
        string weight;
        string detail;
        bool ractopamine;
    }
    uint numProducts =1;
    mapping ( uint => Product ) products;
    
    event LogNewProduct(uint , address );

    
    function newProduct(
        uint _id,
        string memory _name,
        string memory _weight,
        string memory _detail,
        bool _ractopamine
        ) 
        public {
        Product memory Product_temp = Product(_id,_name,_weight,_detail,_ractopamine);
        products[numProducts] = Product_temp;
        numProducts++;
        emit LogNewProduct(numProducts,msg.sender);
    }

    function getProduct(uint _index) 
        public returns (
            uint,string memory,
            string memory,
            string memory,
            bool) {
        return( 
            products[_index].user_id,
            products[_index].name,
            products[_index].weight,
            products[_index].detail,
            products[_index].ractopamine
            );
    }
}