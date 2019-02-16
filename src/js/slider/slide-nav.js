import React from 'react'

export default function slideNav(props) {
    return (
        <i className={"fas fa-angle-" + props.direction} onClick={props.action}></i>
    )
}