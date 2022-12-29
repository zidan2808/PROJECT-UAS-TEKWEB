import React,{useState, useEffect} from "react";
import ReactDom from "react-dom";
import axios from 'axios';

const ProducstList = () => {

    const [products, setProducts] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        axios.get('products').then(res => {
            if (res.status === 200) {
                setProducts(res.data.products);
            }
            setLoading(false);
        });
    }, []);

    return loading ? (
        <h3>Loading...</h3>
    ) : (
            products.length === 0 ? <h3>Product Empty</h3> : products.map((product) => {
                return (
                    <div className="col-lg-4 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div className="featured__item">
                            <div className="featured__item__pic set-bg" data-setbg="">
                                <ul className="featured__item__pic__hover">
                                    <li><a href="#"><i className="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i className="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i className="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div className="featured__item__text">
                                <h6><a href="">MMG</a></h6>
                                <h5>RP. 5000 </h5>
                                <br></br>
                                <a href="" className="primary-btn"> BUY </a>
                            </div>
                        </div>
                    </div>
                )
        })
    );
};



export default ProducstList;

if (document.getElementById("product-list")) {
  ReactDom.render(<ProducstList />, document.getElementById("product-list"));
}
