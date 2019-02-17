import React, { Component } from 'react'
import axios from 'axios';

export default class Gallery extends Component {

    constructor(props) {
        super(props)

        this.state = {}
    }

    componentDidMount() {
        this.callApi(this.slidesEndpoint).then((response)=>{
            this.setState(
                {
                    slides: response.acf.build_a_row[0].pick_a_module[0].slider
                }
            )
        });
    }

    // Method for getting data from the provided end point url
    callApi(endPoint) {
        return new Promise((resolve, reject) => {
            axios.get(endPoint).then((response) => {
                resolve(response.data);
            }).catch((error) => {
                reject(error);
            }); 
        });     
    }
}