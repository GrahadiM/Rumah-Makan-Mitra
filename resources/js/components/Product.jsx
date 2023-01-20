import React, { Component } from "react";
import ReactDOM from "react-dom";
import { Link } from "react-router-dom";
import axios from "axios";
// {{ asset('frontend/assets/img/product') . "/" . $item->thumbnail }}

class Product extends Component {
    async componentDidMount() {
        const res = await axios.get("http://localhost:8000/list");
        console.log(res);
    }

    render() {
        return (
            <div className="col-md-6 col-lg-3 mb-5">
                <a
                    data-bs-toggle="modal"
                    data-bs-target="#cart"
                    className="text-decoration-none"
                >
                    <div className="card card-product">
                        <img
                            src=""
                            className="card-img-top img-fluid"
                            alt="..."
                        />

                        <div className="card-body text-dark">
                            <h5 className="card-title">Nama</h5>
                            <p className="card-text">Deskripsi</p>
                            <div className="text-dark">
                                <i className="fas fa-star star-active"></i> 4.7
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        );
    }
}

// Cara 1

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
