import { Analytics } from '@vercel/analytics/next'
import type { Metadata, Viewport } from 'next'
import './globals.css'

export const metadata: Metadata = {
  title: { default: 'All About Driver — Printer help, without the jargon', template: '%s | All About Driver' },
  description: 'Clear, independent printer troubleshooting guides for errors, Wi-Fi, setup, print quality, and drivers.',
  generator: 'All About Driver',
  openGraph: { title: 'All About Driver', description: 'Simple solutions for everyday printer problems.', type: 'website' },
}
export const viewport: Viewport = { colorScheme: 'light', themeColor: '#0866D9' }
export default function RootLayout({ children }: Readonly<{ children: React.ReactNode }>) { return <html lang="en"><body className="antialiased">{children}{process.env.NODE_ENV === 'production' && <Analytics/>}</body></html> }
