import React from 'react'

export default function galleryItem(props) {
    return (
        <img src={props.src} alt={props.alt} />
    )
}