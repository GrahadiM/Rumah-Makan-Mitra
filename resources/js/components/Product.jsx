import React, { Component, useEffect, useState } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
// {{ asset('frontend/assets/img/product') . "/" . $item->thumbnail }}

// Cara 1

// class Product extends Component {
//     state = {
//         products: [],
//         loading: true,
//     };

//     async componentDidMount() {
//         // console.log("test");
//         const res = await axios.get("http://127.0.0.1:8000/list");
//         // console.log(res);
//         if (res.status === 200) {
//             // console.log("okat");
//             this.setState({
//                 products: await res.data.products,
//                 loading: false,
//             });
//             console.log(this.state.loading);
//         }
//     }

//     render() {
//         if (this.state.loading) {
//             return <div>Loading..</div>;
//         } else if (this.state.loading === false) {
//             Object.entries(this.products).map(([key,value])) => {
//                 return (
//                     <div key={key} className="col-md-6 col-lg-3 mb-5">
//                         <a
//                             data-bs-toggle="modal"
//                             data-bs-target="#cart"
//                             className="text-decoration-none"
//                         >
//                             <div className="card card-product">
//                                 <img
//                                     src={products.thumbnail}
//                                     className="card-img-top img-fluid"
//                                     alt={item.name}
//                                 />

//                                 <div className="card-body text-dark">
//                                     <h5 className="card-title">{item.name}</h5>
//                                     <p className="card-text">{item.body}</p>
//                                     <div className="text-dark">
//                                         <i className="fas fa-star star-active"></i>{" "}
//                                         4.7
//                                     </div>
//                                 </div>
//                             </div>
//                         </a>
//                     </div>
//                 );
//             });
//         }
//         //     productsLoading = "";
//         // this.state.products.map((item) => {
//     }
//     // );
// }
// }
// }

function Product() {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        axios.get("http://127.0.0.1:8000/list").then(({ data }) => {
            setProducts(data.products);
        });
    }, []);
    return (
        <div className="row justify-content-center">
            {products.map((product) => {
                return (
                    <div className="col-md-6 col-lg-3 mb-5" key={product.id}>
                        <a
                            data-bs-toggle="modal"
                            data-bs-target="#cart"
                            className="text-decoration-none"
                        >
                            <div className="card card-product">
                                <img
                                    src={
                                        "frontend/assets/img/product/" +
                                        product.thumbnail
                                    }
                                    className="card-img-top img-fluid"
                                    alt={product.name}
                                />

                                <div className="card-body text-dark">
                                    <h5 className="card-title">
                                        {product.name}
                                    </h5>
                                    <p className="card-text">{product.body}</p>
                                    <div className="text-dark">
                                        <i className="fas fa-star star-active"></i>{" "}
                                        4.7
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                );
            })}
        </div>
    );
}

// Cara 2
// const containers = [{name: '', thumbnail: '', body: ''}]
// // const containers = []
// class Product extends React.Component {
//   constructor() {
//     super();
//     this.state = {
//       containers: []
//     };
//   }
//   componentDidMount() {
//     var self = this;
//     axios.get('/api/list').then((response) => {
//       // Mocking data call here
//       this.setState({
//         containers: containers //response.data
//       });
//     })
//   }
//   render() {
//     const containers = this.state.containers.map( (container, i) => <Container key={i} {...container} /> );

//     return (
//         console.log(containers),
//         <div className="row justify-content-center">
//             {containers}
//         </div>
//     )
//   }
// }

// const Container = ({ name, thumbnail, body }) => (
//     <div className="col-md-6 col-lg-3 mb-5">
//         <a data-bs-toggle="modal" data-bs-target="#cart" className="text-decoration-none">
//             <div className="card card-product">
//                 <img src="{thumbnail}" className="card-img-top img-fluid" alt="..." />

//                 <div className="card-body text-dark">
//                     <h5 className="card-title">{name}</h5>
//                     <p className="card-text">{body}</p>
//                     <div className="text-dark">
//                         <i className="fas fa-star star-active"></i> 4.7
//                     </div>
//                 </div>
//             </div>
//         </a>
//     </div>
// );

export default Product;

if (document.getElementById("product")) {
    ReactDOM.render(<Product />, document.getElementById("product"));
}
