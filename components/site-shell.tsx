'use client'

import Link from 'next/link'
import { useState } from 'react'
import { Menu, Printer, Search, X, ArrowRight } from 'lucide-react'

const nav = [['Troubleshooting','/category/troubleshooting'],['Setup','/category/setup'],['Connectivity','/category/connectivity'],['Print Quality','/category/print-quality'],['Drivers','/category/drivers-software'],['Guides','/category/maintenance-care']]

export function Header() {
  const [open, setOpen] = useState(false)
  return <header className="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div className="mx-auto flex h-16 max-w-7xl items-center justify-between px-5 lg:px-8">
      <Link href="/" className="flex items-center gap-2.5 text-slate-950"><span className="flex size-9 items-center justify-center rounded-xl bg-[#0866D9] text-white"><Printer size={19}/></span><span className="text-lg font-bold tracking-tight">All About <span className="text-[#0866D9]">Driver</span></span></Link>
      <nav className="hidden items-center gap-6 lg:flex">{nav.map(([label, href]) => <Link key={href} href={href} className="text-sm font-medium text-slate-600 transition hover:text-[#0866D9]">{label}</Link>)}<Link href="/search" aria-label="Search" className="rounded-full border border-slate-200 p-2 text-slate-600 hover:text-[#0866D9]"><Search size={17}/></Link></nav>
      <button className="rounded-lg p-2 text-slate-700 lg:hidden" onClick={() => setOpen(!open)} aria-label={open ? 'Close menu' : 'Open menu'}>{open ? <X/> : <Menu/>}</button>
    </div>
    {open && <nav className="border-t border-slate-100 bg-white px-5 py-4 lg:hidden">{nav.map(([label, href]) => <Link onClick={() => setOpen(false)} key={href} href={href} className="flex items-center justify-between border-b border-slate-100 py-3 text-sm font-semibold text-slate-700">{label}<ArrowRight size={15}/></Link>)}</nav>}
  </header>
}

export function Footer() { return <footer className="border-t border-slate-200 bg-[#102A43] text-slate-300"><div className="mx-auto grid max-w-7xl gap-10 px-5 py-14 md:grid-cols-[1.5fr_1fr_1fr] lg:px-8"><div><Link href="/" className="flex items-center gap-2 text-lg font-bold text-white"><span className="flex size-8 items-center justify-center rounded-lg bg-[#0866D9]"><Printer size={16}/></span>All About Driver</Link><p className="mt-4 max-w-sm text-sm leading-6 text-slate-400">Independent printer information and troubleshooting resources for everyday users.</p></div><div><p className="mb-4 text-sm font-bold text-white">Explore</p><div className="flex flex-col gap-3 text-sm"><Link href="/category/troubleshooting">Troubleshooting</Link><Link href="/category/setup">Printer setup</Link><Link href="/category/print-quality">Print quality</Link><Link href="/sitemap">Sitemap</Link></div></div><div><p className="mb-4 text-sm font-bold text-white">About</p><div className="flex flex-col gap-3 text-sm"><Link href="/about">About us</Link><Link href="/contact">Contact</Link><Link href="/editorial-policy">Editorial policy</Link><Link href="/privacy-policy">Privacy policy</Link></div></div></div><div className="border-t border-white/10"><div className="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-5 text-xs text-slate-500 md:flex-row md:justify-between lg:px-8"><span>© 2026 All About Driver. All rights reserved.</span><span>Not affiliated with printer manufacturers.</span></div></div></footer> }

export function Shell({ children }: { children: React.ReactNode }) { return <><Header/>{children}<Footer/></> }
