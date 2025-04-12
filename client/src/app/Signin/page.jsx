import React from 'react'
import styles from '@styles/authentication.module.scss'
import Link from 'next/link'

const Signup = () => {
  return (
    <div className={styles.container}>

      {/* Left pane */}
      <div className={styles.left}>
        <div className={styles.text}>
          <h1 className={styles.logo}>ANQUERO</h1>
          <h2 className={styles.tagline}>
            Simple task <br /> management
          </h2>
        </div>
      </div>


      {/* Right pane */}
      <div className={styles.right}>
        <div className={styles.box}>
          <h2 className={styles.title}>Login</h2>

          <form>
            <label htmlFor="email">Your email</label>
            <input type="email" id="email" name="email" autoComplete="off" />

            <label htmlFor="password">Your password</label>
            <input type="password" id="password" name="password" autoComplete="off" />

            <button type="submit" className={styles.button}>Sign in</button>
          </form>

          <p className={styles.signin}>
           Don't have an account yet?  <Link href='/Signup'>Signup</Link>
          </p>

        </div>
      </div>
    </div>
  );
};

export default Signup;