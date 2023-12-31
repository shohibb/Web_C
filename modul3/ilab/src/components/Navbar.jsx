import React from "react";
import { Link } from "react-router-dom";
import "./Navbar.css";

export const Navbar = () => {
  return (
    <div className="menu">
      <div>
        <img src="images/logo-ilab.png" alt="logo" srcSet="" />
      </div>
      <nav>
        <ul className="horizontal-list">
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/About">About</Link>
          </li>
          <li>
            <Link to="/Contact">Contact</Link>
          </li>
        </ul>
      </nav>
      <div className="action-buttons">
        <button className="action-button-signup">Sign Up</button>
        <button className="action-button-login">Log In</button>
      </div>
    </div>
  );
};
