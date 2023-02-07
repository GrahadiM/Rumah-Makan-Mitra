import React, { Component, useEffect, useState } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

// function convertToSlug(Text) {
//     return Text.toLowerCase()
//                .replace(/[^\w ]+/g, '')
//                .replace(/ +/g, '-');
// }

function IndexPage() {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        axios.get("http://127.0.0.1:8000/list").then(({ data }) => {
            setProducts(data.products)
        });
    }, []);
    return (
        <div>
        {products.map((product, name) => {
            return (
                    <section className="page-section portfolio" key="{name}">
                        <div className="container">
                            <h2 className="page-section-heading text-center text-uppercase text-secondary mb-0">{name}</h2>
                            <div className="divider-custom">
                                <div className="divider-custom-line"></div>
                                <div className="divider-custom-icon"><i className="fas fa-star"></i></div>
                                <div className="divider-custom-icon"><i className="fas fa-star"></i></div>
                                <div className="divider-custom-icon"><i className="fas fa-star"></i></div>
                                <div className="divider-custom-icon"><i className="fas fa-star"></i></div>
                                <div className="divider-custom-icon"><i className="fas fa-star"></i></div>
                                <div className="divider-custom-line"></div>
                            </div>
                            <div className="row justify-content-center">
                            {product.map((item) => {
                                return (
                                    <div className="col-md-6 col-lg-3 mb-5" key={item.id}>
                                        <a
                                            data-bs-toggle="modal"
                                            data-bs-target="#cart"
                                            className="text-decoration-none"
                                        >
                                            <div className="card card-product">
                                                <img
                                                    src={
                                                        "frontend/assets/img/product/" +
                                                        item.thumbnail
                                                    }
                                                    className="card-img-top img-fluid"
                                                    alt={item.name}
                                                />

                                                <div className="card-body text-dark">
                                                    <h5 className="card-title">
                                                        {item.name}
                                                    </h5>
                                                    <p className="card-text">{item.body}</p>
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
                        </div>
                    </section>
                );
            })}
        </div>
    );
}

export default IndexPage;

if (document.getElementById("indexPage")) {
    ReactDOM.render(<IndexPage />, document.getElementById("indexPage"));
}
