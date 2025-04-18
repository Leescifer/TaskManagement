import { Inter } from 'next/font/google';
import '@styles/globals.css';
import Navbar from '@components/Navbar.jsx'
import { Metadata as NextMetadata } from 'next';

export const metadata = {
  title: "Task Management",
  description: "Generated by next and laravel",
}

const inter = Inter({
  subsets: ['latin'],
});

export default function RootLayout({ children }) {
  return (
    <html lang="en">
      <body className={inter.className}>
        <Navbar/>
        {children}
      </body>
    </html>
  );
}
