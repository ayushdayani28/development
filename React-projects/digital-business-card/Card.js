import React from "react"
import Profile from "./components/Profile"
import Info from "./components/Info"
import Bio from "./components/Bio"
import Footer from "./components/Footer"

export default function Card(){
    return (
        <div className="card">
            <Profile />
            <Info />
            <Bio />
            <Footer />
        </div>
    )
}
